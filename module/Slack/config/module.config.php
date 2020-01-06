<?php
/**
 * Perforce Swarm Slack Module
 *
 * @license     Please see LICENSE.txt in top-level folder of this distribution.
 */

$listeners = [Slack\Listener\SlackActivityListener::class];

return [
    'listeners' => $listeners,
    'service_manager' =>[
        'factories' => array_fill_keys(
            $listeners,
            Events\Listener\ListenerFactory::class
        )
    ],
    Events\Listener\ListenerFactory::EVENT_LISTENER_CONFIG => [
        Events\Listener\ListenerFactory::ALL => [
            Slack\Listener\SlackActivityListener::class => [
                [
                    Events\Listener\ListenerFactory::PRIORITY => -110,
                    Events\Listener\ListenerFactory::CALLBACK => 'handleEvent',
                    Events\Listener\ListenerFactory::MANAGER_CONTEXT => 'queue'
                ]
            ]
        ],
    ],
    'slack' => [
		'swarm_host' => 'your_host_ip',
		'slack_ids' => [
			'swarm_id' => 'slack_id',
        ],
        'channel' => 'destination_slack_channel',
        'username' => 'slack_poster_username',
        'icon_emoji' => 'slack_poster_icon',
		'slack_webhook' => 'https://hooks.slack.com/services/___YOUR_TOKEN_HERE___',
    ]
];
