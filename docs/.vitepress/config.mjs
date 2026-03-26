import {defineConfig} from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
    title: "Laravel waha",
    description: "A Laravel package for waha integration",
    lastUpdated: false,
    sitemap: {
        hostname: 'https://waha.njoguamos.me.ke'
    },
    head: [
        // ['link', { rel: 'icon', type: 'image/svg+xml', href: '/favicon.svg' }],
        // ['meta', { property: 'og:image', content: '/njoguamos-laravel-waha.webp' }],
        // ['meta', { property: 'og:image:type', content: 'image/webp' }],
        // ['meta', { property: 'og:image:width', content: '1200' }],
        // ['meta', { property: 'og:image:height', content: '630' }],
        // ['meta', { name: 'twitter:card', content: 'summary_large_image' }],
        [
            'script',
            { defer: '', 'data-domain': 'waha.njoguamos.me.ke', src: 'https://stats.njoguamos.me.ke/js/script.js' }
        ],
    ],
    themeConfig: {
        search: {
            provider: 'local'
        },

        nav: [
            {text: 'Home', link: '/'},
            {text: 'Guide', link: '/introduction/getting-started'},
            {text: 'Handling Response', link: '/introduction/responses'},
            {text: 'Changelog', link: '/introduction/changelog'},
        ],

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    {text: 'About WAHA', link: '/introduction/about'},
                    {text: 'Getting Started', link: '/introduction/getting-started'},
                    {text: 'Handling Response', link: '/introduction/responses'},
                    {text: 'Changelog', link: '/introduction/changelog'},
                ]
            },
            {
                text: 'API',
                collapsed: false,
                items: [
                    {
                        text: '🖥️ Sessions',
                        collapsed: true,
                        items: [
                            {text: 'List Sessions', link: '/api/sessions/list-sessions'},
                            {text: 'Get Session', link: '/api/sessions/get-session'},
                            {text: 'Create Session', link: '/api/sessions/create-session'},
                            {text: 'Update Session', link: '/api/sessions/update-session'},
                            {text: 'Delete Session', link: '/api/sessions/delete-session'},
                            {text: 'Start Session', link: '/api/sessions/start-session'},
                            {text: 'Stop Session', link: '/api/sessions/stop-session'},
                            {text: 'Restart Session', link: '/api/sessions/restart-session'},
                            {text: 'Logout Session', link: '/api/sessions/logout-session'},
                            {text: 'Get Screenshot', link: '/api/sessions/get-screenshot'},
                            {text: 'Get Me', link: '/api/sessions/get-me'},
                        ]
                    },
                    {
                        text: '📤 Send Messages',
                        collapsed: true,
                        items: [
                            {text: 'Send Text', link: '/api/send-messages/send-text'},
                            {text: 'Send Image', link: '/api/send-messages/send-image'},
                            {text: 'Send File', link: '/api/send-messages/send-file'},
                            {text: 'Send Voice', link: '/api/send-messages/send-voice'},
                            {text: 'Send Video', link: '/api/send-messages/send-video'},
                            {text: 'Send Location', link: '/api/send-messages/send-location'},
                            {text: 'Send Link Preview', link: '/api/send-messages/send-link-preview'},
                            {text: 'Send Poll', link: '/api/send-messages/send-poll'},
                            {text: 'Send Poll Vote', link: '/api/send-messages/send-poll-vote'},
                            {text: 'Send List', link: '/api/send-messages/send-list'},
                            {text: 'Forward Message', link: '/api/send-messages/forward-message'},
                            {text: 'Send Seen', link: '/api/send-messages/send-seen'},
                            {text: 'Start Typing', link: '/api/send-messages/start-typing'},
                            {text: 'Stop Typing', link: '/api/send-messages/stop-typing'},
                        ]
                    },
                    {
                        text: '🆔 Profile',
                        collapsed: true,
                        items: [
                            {text: 'Get Profile', link: '/api/profile/get-profile'},
                            {text: 'Set Profile Name', link: '/api/profile/set-profile-name'},
                            {text: 'Set Profile Status', link: '/api/profile/set-profile-status'},
                            {text: 'Set Profile Picture', link: '/api/profile/set-profile-picture'},
                            {text: 'Delete Profile Picture', link: '/api/profile/delete-profile-picture'},
                        ]
                    },
                    {
                        text: '📶 Polls',
                        collapsed: true,
                        items: [
                            {text: 'Send Poll ⚠️', link: '/api/polls/send-poll'},
                            {text: 'Send Poll Vote ⚠️', link: '/api/polls/send-poll-vote'},
                        ]
                    },
                    {
                        text: '💬 Chats',
                        collapsed: true,
                        items: [
                            {text: 'Get All Chats ⚠️', link: '/api/chats/get-all-chats'},
                            {text: 'Get Chats Overview ⚠️', link: '/api/chats/get-chats-overview'},
                            {text: 'Get Chat Picture ⚠️', link: '/api/chats/get-chat-picture'},
                            {text: 'Mark Chat Unread ⚠️', link: '/api/chats/mark-chat-unread'},
                            {text: 'Archive Chat ⚠️', link: '/api/chats/archive-chat'},
                            {text: 'Unarchive Chat ⚠️', link: '/api/chats/unarchive-chat'},
                            {text: 'Delete Chat ⚠️', link: '/api/chats/delete-chat'},
                            {text: 'Read Messages ⚠️', link: '/api/chats/read-messages'},
                            {text: 'Get Messages ⚠️', link: '/api/chats/get-messages'},
                            {text: 'Get Message By ID ⚠️', link: '/api/chats/get-message-by-id'},
                            {text: 'Pin Message ⚠️', link: '/api/chats/pin-message'},
                            {text: 'Unpin Message ⚠️', link: '/api/chats/unpin-message'},
                            {text: 'Edit Message ⚠️', link: '/api/chats/edit-message'},
                            {text: 'Delete Message ⚠️', link: '/api/chats/delete-message'},
                            {text: 'Delete All Messages ⚠️', link: '/api/chats/delete-all-messages'},
                        ]
                    },
                    {
                        text: '👤 Contacts',
                        collapsed: true,
                        items:[
                            {
                                text: 'c.us',
                                collapsed: false,
                                items: [
                                    {text: 'All Contacts', link: '/api/contacts/c.us/all-contacts'},
                                    {text: 'Get Contact', link: '/api/contacts/c.us/get-contact'},
                                    {text: 'Update Contact', link: '/api/contacts/c.us/update-contact'},
                                    {text: 'Check Exists', link: '/api/contacts/c.us/check-exists'},
                                    {text: 'Get About', link: '/api/contacts/c.us/get-about'},
                                    {text: 'Profile Picture', link: '/api/contacts/c.us/profile-picture'},
                                    {text: 'Block Contact', link: '/api/contacts/c.us/block-contact'},
                                    {text: 'Unblock Contact', link: '/api/contacts/c.us/unblock-contact'},
                                ]
                            },
                            {
                                text: 'LIDs',
                                collapsed: false,
                                items: [
                                    {text: 'Known LIDs', link: '/api/contacts/lids/known-lids'},
                                    {text: 'Count of LIDs', link: '/api/contacts/lids/count-lids'},
                                    {text: 'Phone Number by LID', link: '/api/contacts/lids/phone-number-by-lid'},
                                    {text: 'LID by Phone Number', link: '/api/contacts/lids/lid-by-phone-number'},
                                ]
                            },
                        ]
                    },
                    {
                        text: '📢 Channels',
                        collapsed: true,
                        items: [
                            {
                                text: 'Channels API',
                                collapsed: false,
                                items: [
                                    {text: 'Preview Channel Messages ⚠️', link: '/api/channels/channels/preview-messages'},
                                    {text: 'Create Channel ⚠️', link: '/api/channels/channels/create-channel'},
                                    {text: 'Get Channel ⚠️', link: '/api/channels/channels/get-channel'},
                                    {text: 'List Channels ⚠️', link: '/api/channels/channels/list-channels'},
                                    {text: 'Delete Channel ⚠️', link: '/api/channels/channels/delete-channel'},
                                    {text: 'Get Messages ⚠️', link: '/api/channels/channels/get-messages'},
                                ]
                            },
                            {
                                text: 'Search API',
                                collapsed: false,
                                items: [
                                    {text: 'Search by View ⚠️', link: '/api/channels/search/search-by-view'},
                                    {text: 'Search by Text ⚠️', link: '/api/channels/search/search-by-text'},
                                    {text: 'Views for Search ⚠️', link: '/api/channels/search/get-views'},
                                    {text: 'Countries for Search ⚠️', link: '/api/channels/search/get-countries'},
                                    {text: 'Categories for Search ⚠️', link: '/api/channels/search/get-categories'},
                                ]
                            },
                        ]
                    },
                    {
                        text: '🟢 Status',
                        collapsed: true,
                        items: [
                            {text: 'Send Text Status', link: '/api/status/send-text-status'},
                            {text: 'Send Image Status', link: '/api/status/send-image-status'},
                        ]
                    },
                    {
                        text: '👥 Groups',
                        collapsed: true,
                        items: [
                            {text: 'Create Group ⚠️', link: '/api/groups/create-group'},
                            {text: 'List Groups ⚠️', link: '/api/groups/list-groups'},
                            {text: 'Count Groups ⚠️', link: '/api/groups/count-groups'},
                            {text: 'Get Join Info ⚠️', link: '/api/groups/get-join-info'},
                            {text: 'Join Group ⚠️', link: '/api/groups/join-group'},
                            {text: 'Get Group ⚠️', link: '/api/groups/get-group'},
                            {text: 'Delete Group ⚠️', link: '/api/groups/delete-group'},
                            {text: 'Leave Group ⚠️', link: '/api/groups/leave-group'},
                            {text: 'Get Group Picture ⚠️', link: '/api/groups/get-group-picture'},
                            {text: 'Update Group Picture ⚠️', link: '/api/groups/update-group-picture'},
                            {text: 'Delete Group Picture ⚠️', link: '/api/groups/delete-group-picture'},
                            {text: 'Update Group Description ⚠️', link: '/api/groups/update-group-description'},
                            {text: 'Update Group Subject ⚠️', link: '/api/groups/update-group-subject'},
                            {text: 'Get Invite Code ⚠️', link: '/api/groups/get-invite-code'},
                            {text: 'Revoke Invite Code ⚠️', link: '/api/groups/revoke-invite-code'},
                            {text: 'Get Info Admin Only ⚠️', link: '/api/groups/get-security-info-admin-only'},
                            {text: 'Set Info Admin Only ⚠️', link: '/api/groups/set-security-info-admin-only'},
                            {text: 'Get Messages Admin Only ⚠️', link: '/api/groups/get-security-messages-admin-only'},
                            {text: 'Set Messages Admin Only ⚠️', link: '/api/groups/set-security-messages-admin-only'},
                            {text: 'Get Participants ⚠️', link: '/api/groups/get-participants'},
                            {text: 'Add Participant ⚠️', link: '/api/groups/add-participant'},
                            {text: 'Remove Participant ⚠️', link: '/api/groups/remove-participant'},
                            {text: 'Promote Participant ⚠️', link: '/api/groups/promote-participant'},
                            {text: 'Demote Participant ⚠️', link: '/api/groups/demote-participant'},
                        ]
                    },
                    {
                        text: '✅ Presence',
                        collapsed: true,
                        items: [
                            {text: 'Get All Presence ⚠️', link: '/api/presence/get-presence'},
                            {text: 'Set Presence', link: '/api/presence/set-presence'},
                            {text: 'Subscribe to Presence ⚠️', link: '/api/presence/subscribe-presence'},
                        ]
                    },
                    {
                        text: '🏷️ Labels',
                        collapsed: true,
                        items: [
                            {text: 'Get All Labels ⚠️', link: '/api/labels/get-all-labels'},
                            {text: 'Create Label ⚠️', link: '/api/labels/create-label'},
                            {text: 'Update Label ⚠️', link: '/api/labels/update-label'},
                            {text: 'Delete Label ⚠️', link: '/api/labels/delete-label'},
                            {text: 'Get Chats by Label ⚠️', link: '/api/labels/get-chats-by-label'},
                            {text: 'Get Labels by Chat ⚠️', link: '/api/labels/get-labels-by-chat'},
                            {text: 'Put Labels to Chat ⚠️', link: '/api/labels/put-labels-to-chat'},
                        ]
                    },
                    {
                        text: '📅 Event Message',
                        collapsed: true,
                        items: [
                            {text: 'Send Event Message ⚠️', link: '/api/event-message/send-event-message'},
                        ]
                    },
                    {
                        text: '📞 Calls',
                        collapsed: true,
                        items: [
                            {text: 'Configure Calls ⚠️', link: '/api/calls/configure-calls'},
                        ]
                    },
                    {
                        text: '🧩 Apps',
                        collapsed: true,
                        items: [
                            {text: 'List Apps', link: '/api/apps/list-apps'},
                            {text: 'Create App', link: '/api/apps/create-app'},
                            {text: 'Update App', link: '/api/apps/update-app'},
                            {text: 'Delete App', link: '/api/apps/delete-app'},
                        ]
                    },
                    {
                        text: '🔭 Observability',
                        collapsed: true,
                        items: [
                            {text: 'Ping', link: '/api/observability/ping'},
                            {text: 'Get Server Version', link: '/api/observability/get-server-version'},
                            {text: 'Get Server Environment', link: '/api/observability/get-server-environment'},
                            {text: 'Get Server Status', link: '/api/observability/get-server-status'},
                            {text: 'Restart Server', link: '/api/observability/restart-server'},
                            {text: 'Health Check', link: '/api/observability/health-check'},
                            {text: 'Node Heapsnapshot', link: '/api/observability/debug-heapsnapshot'},
                            {text: 'Node CPU Profiling', link: '/api/observability/debug-cpu-profiling'},
                            {text: 'Browser Trace', link: '/api/observability/debug-browser-trace'},
                        ]
                    },
                ]
            },
            {
                text: 'Webhook Events',
                collapsed: false,
                items: [
                    {
                        text: '🖥️ Sessions',
                        collapsed: true,
                        items: [
                            {text: 'Session Status ⚠️', link: '/events/sessions/session-status'},
                            {text: 'Message ⚠️', link: '/events/sessions/message'},
                            {text: 'Message Any ⚠️', link: '/events/sessions/message-any'},
                            {text: 'Message Ack ⚠️', link: '/events/sessions/message-ack'},
                            {text: 'Message Revoked ⚠️', link: '/events/sessions/message-revoked'},
                            {text: 'Message Reaction ⚠️', link: '/events/sessions/message-reaction'},
                            {text: 'QR Code ⚠️', link: '/events/sessions/qr'},
                            {text: 'Engine Event ⚠️', link: '/events/sessions/engine-event'},
                        ]
                    },
                    {
                        text: '📥 Receive Messages',
                        collapsed: true,
                        items: [
                            {text: 'Overview ⚠️', link: '/api/receive-messages/overview'},
                            {text: 'Message ⚠️', link: '/api/receive-messages/message'},
                            {text: 'Message Any ⚠️', link: '/api/receive-messages/message-any'},
                            {text: 'Message Ack ⚠️', link: '/api/receive-messages/message-ack'},
                            {text: 'Message Revoked ⚠️', link: '/api/receive-messages/message-revoked'},
                            {text: 'Message Reaction ⚠️', link: '/api/receive-messages/message-reaction'},
                            {text: 'Message Waiting ⚠️', link: '/api/receive-messages/message-waiting'},
                            {text: 'Media ⚠️', link: '/api/receive-messages/media'},
                            {text: 'Polls ⚠️', link: '/api/receive-messages/polls'},
                        ]
                    },
                    {
                        text: '📶 Polls',
                        collapsed: true,
                        items: [
                            {text: 'Poll Vote ⚠️', link: '/events/polls/poll-vote'},
                            {text: 'Poll Vote Failed ⚠️', link: '/events/polls/poll-vote-failed'},
                        ]
                    },
                    {
                        text: '💬 Chats',
                        collapsed: true,
                        items: [
                            {text: 'Chat Archive ⚠️', link: '/events/chats/chat-archive'},
                        ]
                    },
                    {
                        text: '👥 Groups',
                        collapsed: true,
                        items: [
                            {text: 'Group Join (v2) ⚠️', link: '/events/groups/group-v2-join'},
                            {text: 'Group Leave (v2) ⚠️', link: '/events/groups/group-v2-leave'},
                            {text: 'Group Participants (v2) ⚠️', link: '/events/groups/group-v2-participants'},
                            {text: 'Group Update (v2) ⚠️', link: '/events/groups/group-v2-update'},
                        ]
                    },
                    {
                        text: '✅ Presence',
                        collapsed: true,
                        items: [
                            {text: 'Presence Update ⚠️', link: '/events/presence/presence-update'},
                        ]
                    },
                    {
                        text: '🏷️ Labels',
                        collapsed: true,
                        items: [
                            {text: 'Label Upsert ⚠️', link: '/events/labels/label-upsert'},
                            {text: 'Label Deleted ⚠️', link: '/events/labels/label-deleted'},
                            {text: 'Label Chat Added ⚠️', link: '/events/labels/label-chat-added'},
                            {text: 'Label Chat Deleted ⚠️', link: '/events/labels/label-chat-deleted'},
                        ]
                    },
                    {
                        text: '📅 Event Message',
                        collapsed: true,
                        items: [
                            {text: 'Event Response ⚠️', link: '/events/event-message/event-response'},
                            {text: 'Event Response Failed ⚠️', link: '/events/event-message/event-response-failed'},
                        ]
                    },
                    {
                        text: '📞 Calls',
                        collapsed: true,
                        items: [
                            {text: 'Call Accepted ⚠️', link: '/events/calls/call-accepted'},
                            {text: 'Call Rejected ⚠️', link: '/events/calls/call-rejected'},
                        ]
                    },
                ]
            },
            {
                text: 'References',
                collapsed: false,
                items: [
                    {
                        text: 'DTOs',
                        collapsed: true,
                        items: [
                            {text: 'Text Status Data', link: '/reference/dto/text-status-data'},
                            {text: 'Image Status Data', link: '/reference/dto/image-status-data'},
                            {text: 'Session Data', link: '/reference/dto/session-data'},
                            {text: 'Session Config Data', link: '/reference/dto/session-config-data'},
                            {text: 'Session Me Data', link: '/reference/dto/session-me-data'},
                            {text: 'Session Engine Data', link: '/reference/dto/session-engine-data'},
                            {text: 'Session Proxy Data', link: '/reference/dto/session-proxy-data'},
                            {text: 'Session Webhook Data', link: '/reference/dto/session-webhook-data'},
                            {text: 'Session Webhook HMAC Data', link: '/reference/dto/session-webhook-hmac-data'},
                            {text: 'Session Webhook Retry Data', link: '/reference/dto/session-webhook-retry-data'},
                            {text: 'Session Webhook Custom Header Data', link: '/reference/dto/session-webhook-custom-header-data'},
                            {text: 'Session Config Client Data', link: '/reference/dto/session-config-client-data'},
                            {text: 'Session Config Ignore Data', link: '/reference/dto/session-config-ignore-data'},
                            {text: 'Session Config NOWEB Data', link: '/reference/dto/session-config-noweb-data'},
                            {text: 'Session Config WEBJS Data', link: '/reference/dto/session-config-webjs-data'},
                            {text: 'Server Version Data', link: '/reference/dto/server-version-data'},
                            {text: 'App Data', link: '/reference/dto/app-data'},
                            {text: 'Message Poll Data', link: '/reference/dto/message-poll-data'},
                            {text: 'Message Poll Vote Data', link: '/reference/dto/message-poll-vote-data'},
                            {text: 'Poll Data', link: '/reference/dto/poll-data'},
                            {text: 'Message Location Data', link: '/reference/dto/message-location-data'},
                        ]
                    },
                    {
                        text: 'Enums',
                        collapsed: true,
                        items: [
                            {text: 'Session Status', link: '/reference/enums/session-status'},
                            {text: 'Presence', link: '/reference/enums/presence'},
                            {text: 'Engine', link: '/reference/enums/engine'},
                            {text: 'Version', link: '/reference/enums/version'},
                            {text: 'App Type', link: '/reference/enums/app-type'},
                        ]
                    },
                ]
            },
        ],

        socialLinks: [
            {icon: 'github', link: 'https://github.com/njoguamos/laravel-waha'}
        ],

        footer: {
            message: 'Released under the MIT License.',
            copyright: 'Copyright © 2025-present Things Telemetry'
        }
    }
})
