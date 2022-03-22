<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi;

use GusApi\Exception\InvalidUserKeyException;
use GusApi\Exception\NotFoundException;
use GusApi\GusApi;
use GusApi\ReportTypes;
use Primotly\GusRegonApi\Model\GusInfo;
use SoapFault;

class Client
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var GusApi
     */
    private $client;

    /**
     * @var TransformerInterface
     */
    private $transformer;

    public function __construct(Config $config, TransformerInterface $transformer)
    {
        $this->config = $config;
        $this->transformer = $transformer;
    }

    public function getGusInfoByNip(string $nip): GusInfo
    {
        try {
            $this->getClient()->login();

            $reports = $this->getClient()->getByNip($nip);

            if (! array_key_exists(0, $reports)) {
                throw new GusRegonApiException('No data returned');
            }

            $fullReport = $this->getClient()->getFullReport($reports[0], ReportTypes::REPORT_PUBLIC_LAW);

            if (! array_key_exists(0, $fullReport)) {
                throw new GusRegonApiException('No data returned');
            }

            return $this->transformer->searchReport2GusInfo($reports[0], $fullReport[0]);
        } catch (InvalidUserKeyException $e) {
            throw new GusRegonApiException('Invalid API user key');
        } catch (NotFoundException $e) {
            throw new GusRegonApiException('Not found');
        } catch (SoapFault $e) {
            throw new GusRegonApiException('SoapFault: ' . $e->getMessage());
        } catch (GusRegonApiException $e) {
            throw $e;
        }
    }

    private function createClient(): GusApi
    {
        return new GusApi($this->config->getApiKey(), $this->config->isDev() ? 'dev' : 'prod');
    }

    private function getClient(): GusApi
    {
        return empty($this->client)
            ? ($this->client = $this->createClient())
            : $this->client;
    }
}
