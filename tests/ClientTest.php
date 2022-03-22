<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi\Tests;

use PHPUnit\Framework\TestCase;
use Primotly\GusRegonApi\Client;
use Primotly\GusRegonApi\Config;
use Primotly\GusRegonApi\GusRegonApiException;
use Primotly\GusRegonApi\Transformer;

class ClientTest extends TestCase
{
    public function testGetGusInfoByNip(): void
    {
        $client = new Client(new Config(), new Transformer());

        $info = $client->getGusInfoByNip('6792737681');

        $this->assertSame('POLSKIE SKŁADY OPONIARSKIE SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ', $info->getName());
        $this->assertSame('MAŁOPOLSKIE', $info->getState());
        $this->assertSame('m. Kraków', $info->getRegion());
        $this->assertSame('Kraków-Podgórze', $info->getBorough());
        $this->assertSame('Kraków', $info->getCity());
        $this->assertSame('30-415', $info->getZipCode());
        $this->assertSame('ul. Test-Wilcza', $info->getStreet());
        $this->assertSame('P', $info->getTypeId());
        $this->assertSame('8A', $info->getBuildingNumber());
        $this->assertNull($info->getFlatNumber());
        $this->assertTrue($info->isActive());
        $this->assertSame('356570470', $info->getRegon());
        $this->assertSame('6792737681', $info->getTaxId());
        $this->assertSame('0000137445', $info->getNationalCourtRegisterId());
    }

    public function testGetGusInfoByNipThrows(): void
    {
        $client = new Client(new Config(), new Transformer());

        $this->expectException(GusRegonApiException::class);
        $this->expectExceptionMessage('Not found');
        $client->getGusInfoByNip('not-existing');
    }
}
