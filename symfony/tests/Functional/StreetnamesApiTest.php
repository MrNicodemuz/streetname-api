<?php

namespace App\Tests\Functional;

use Symfony\Component\HttpFoundation\Response;
use ApiPlatform\Core\Exception\FilterValidationException;

/**
 * @group functional
 * @group api
 */
class StreetnamesApiTest extends BaseWebTestCase
{
    /**
     * @return string[][]
     */
    public function provideCitySearches(): array
    {
        return [
            'Search for "tie" in Helsinki should return more than 50 results' => [
                'tie',
                'Helsinki',
                50,
            ],
            'Search for "väg" in Helsingfors should return more than 50 results' => [
                'väg',
                'Helsingfors',
                50,
            ],
            'Search for junk should return no results' => [
                'CORONAVIRUS',
                'CORONAVIRUS',
                0,
            ],
        ];
    }

    /**
     * @dataProvider provideCitySearches
     */
    public function testStreetnamesAPICanBeSearchedByStreetAndCity($street, $city, $expectedResults)
    {
        $client = $this->creatApiClient();

        $crawler = $client->request(
            'GET',
            '/streets?street=' . $street . '&city=' . $city
        );

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($data);

        // Response fields
        $this->assertArrayHasKey('links', $data);
        $this->assertArrayHasKey('meta', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals(3, sizeof($data));

        $this->assertEquals($expectedResults, sizeof($data['data']));

        foreach ($data['data'] as $member) {
            $this->assertArrayHasKey('id', $member);
            $this->assertArrayHasKey('type', $member);
            $this->assertArrayHasKey('attributes', $member);

            $this->assertArrayHasKey('streetName', $member['attributes']);
            $this->assertArrayHasKey('streetNameAlt', $member['attributes']);
            $this->assertArrayHasKey('postalCode', $member['attributes']);
            $this->assertArrayHasKey('city', $member['attributes']);
            $this->assertArrayHasKey('cityAlt', $member['attributes']);
            $this->assertArrayHasKey('minApartmentNo', $member['attributes']);
            $this->assertArrayHasKey('maxApartmentNo', $member['attributes']);

            $this->assertStringContainsStringIgnoringCase(
                $city,
                $member['attributes']['city'] . $member['attributes']['cityAlt']
            );
        }
    }

    /**
     * @return string[][]
     */
    public function provideStreetSearches(): array
    {
        return [
            'Search for Mannerheimintie should return 27 results' => [
                'Mannerheimintie',
                27,
            ],
            'Search for Mannerheimsvägen should return 27 results' => [
                'Mannerheimintie',
                27,
            ],
            'Search for junk should return no results' => [
                'CORONAVIRUS',
                0,
            ],
        ];
    }

    /**
     * @dataProvider provideStreetSearches
     */
    public function testStreetnamesAPICanBeSearchedByStreet($keyword, $expectedResults)
    {
        $client = $this->creatApiClient();

        $crawler = $client->request(
            'GET',
            '/streets?street=' . $keyword
        );

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($data);

        // Response fields
        $this->assertArrayHasKey('links', $data);
        $this->assertArrayHasKey('meta', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals(3, sizeof($data));

        $this->assertEquals($expectedResults, sizeof($data['data']));

        foreach ($data['data'] as $member) {
            $this->assertArrayHasKey('id', $member);
            $this->assertArrayHasKey('type', $member);
            $this->assertArrayHasKey('attributes', $member);

            $this->assertArrayHasKey('streetName', $member['attributes']);
            $this->assertArrayHasKey('streetNameAlt', $member['attributes']);
            $this->assertArrayHasKey('postalCode', $member['attributes']);
            $this->assertArrayHasKey('city', $member['attributes']);
            $this->assertArrayHasKey('cityAlt', $member['attributes']);
            $this->assertArrayHasKey('minApartmentNo', $member['attributes']);
            $this->assertArrayHasKey('maxApartmentNo', $member['attributes']);

            $this->assertStringContainsStringIgnoringCase(
                $keyword,
                $member['attributes']['streetName'] . $member['attributes']['streetNameAlt']
            );
        }
    }

    public function testStreetnamesAPIShouldReturnBadRequestWithNoParams()
    {
        $this->expectException(FilterValidationException::class);

        $client = $this->creatApiClient();
        $client->catchExceptions(false);

        $crawler = $client->request(
            'GET',
            '/streets'
        );

        $this->assertSame(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }

    public function testStreetnamesAPIShouldReturnBadRequestWithNoStreetParam()
    {
        $this->expectException(FilterValidationException::class);

        $client = $this->creatApiClient();
        $client->catchExceptions(false);

        $crawler = $client->request(
            'GET',
            '/streets?city=Helsinki'
        );

        $this->assertSame(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }

    public function testStreetnamesAPIShouldReturnBadRequestWithJunkParam()
    {
        $this->expectException(FilterValidationException::class);

        $client = $this->creatApiClient();
        $client->catchExceptions(false);

        $crawler = $client->request(
            'GET',
            '/streets?foo=bar'
        );

        $this->assertSame(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }
}
