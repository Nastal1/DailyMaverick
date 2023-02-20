<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Insights\V1\Call;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class EventTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->insights->v1->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->events->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://insights.twilio.com/v1/Voice/CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Events'
        ));
    }

    public function testReadResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Events?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "next_page_url": null,
                    "key": "events",
                    "url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Events?PageSize=50&Page=0"
                },
                "events": [
                    {
                        "timestamp": "2019-09-19T22:15:23Z",
                        "call_sid": "CA03a02b156c6faa96c86906f7e9ad0f38",
                        "account_sid": "AC998c10b68cbfda9f67277f7d8f4439c9",
                        "edge": "sdk_edge",
                        "group": "connection",
                        "name": "error",
                        "level": "ERROR",
                        "sdk_edge": {
                            "error": {
                                "code": 31600
                            },
                            "metadata": {
                                "client_name": "GTI9300323095d271b890c91568931321395",
                                "location": {
                                    "lat": 37.4192,
                                    "lon": -122.0574
                                },
                                "city": "Mountain View",
                                "country_code": "US",
                                "country_subdivision": "California",
                                "ip_address": "108.177.7.83",
                                "sdk": {
                                    "type": "twilio-voice-android",
                                    "version": "4.5.1",
                                    "platform": "android",
                                    "selected_region": "gll",
                                    "os": {
                                        "name": "android",
                                        "version": "4.3"
                                    },
                                    "device": {
                                        "model": "GT-I9300",
                                        "type": "GT-I9300",
                                        "vendor": "samsung",
                                        "arch": "armeabi-v7a"
                                    }
                                }
                            }
                        },
                        "client_edge": null,
                        "carrier_edge": null,
                        "sip_edge": null
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->insights->v1->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->events->read();

        $this->assertNotNull($actual);
    }

    public function testReadDeepResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 10,
                    "page_size": 5,
                    "first_page_url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Events?PageSize=5&Page=0",
                    "previous_page_url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Events?PageSize=5&Page=9&PageToken=DP10",
                    "next_page_url": null,
                    "key": "events",
                    "url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Events?PageSize=5&Page=10"
                },
                "events": [
                    {
                        "timestamp": "2019-09-19T22:15:23Z",
                        "call_sid": "CA03a02b156c6faa96c86906f7e9ad0f38",
                        "account_sid": "AC998c10b68cbfda9f67277f7d8f4439c9",
                        "edge": "sdk_edge",
                        "group": "connection",
                        "name": "error",
                        "level": "ERROR",
                        "sdk_edge": {
                            "error": {
                                "code": 31600
                            },
                            "metadata": {
                                "client_name": "GTI9300323095d271b890c91568931321395",
                                "location": {
                                    "lat": 37.4192,
                                    "lon": -122.0574
                                },
                                "city": "Mountain View",
                                "country_code": "US",
                                "country_subdivision": "California",
                                "ip_address": "108.177.7.83",
                                "sdk": {
                                    "type": "twilio-voice-android",
                                    "version": "4.5.1",
                                    "platform": "android",
                                    "selected_region": "gll",
                                    "os": {
                                        "name": "android",
                                        "version": "4.3"
                                    },
                                    "device": {
                                        "model": "GT-I9300",
                                        "type": "GT-I9300",
                                        "vendor": "samsung",
                                        "arch": "armeabi-v7a"
                                    }
                                }
                            }
                        },
                        "client_edge": null,
                        "carrier_edge": null,
                        "sip_edge": null
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->insights->v1->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->events->read();

        $this->assertNotNull($actual);
    }
}