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
            {text: 'Changelog', link: '/introduction/changelog'},
        ],

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    {text: 'About WAHA', link: '/introduction/about'},
                    {text: 'Getting Started', link: '/introduction/getting-started'},
                    {text: 'Changelog', link: '/introduction/changelog'},
                ]
            },
            {
                text: '🖥️ Sessions',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'List Sessions', link: '/sessions/api/list-sessions'},
                            {text: 'Get Session', link: '/sessions/api/get-session'},
                            {text: 'Create Session ⚠️', link: '/sessions/api/create-session'},
                            {text: 'Update Session ⚠️', link: '/sessions/api/update-session'},
                            {text: 'Delete Session ⚠️', link: '/sessions/api/delete-session'},
                            {text: 'Start Session', link: '/sessions/api/start-session'},
                            {text: 'Stop Session', link: '/sessions/api/stop-session'},
                            {text: 'Restart Session', link: '/sessions/api/restart-session'},
                            {text: 'Logout Session', link: '/sessions/api/logout-session'},
                            {text: 'Get Screenshot ⚠️', link: '/sessions/api/get-screenshot'},
                            {text: 'Get Me ⚠️', link: '/sessions/api/get-me'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Session Status ⚠️', link: '/sessions/events/session-status'},
                            {text: 'Message ⚠️', link: '/sessions/events/message'},
                            {text: 'Message Any ⚠️', link: '/sessions/events/message-any'},
                            {text: 'Message Ack ⚠️', link: '/sessions/events/message-ack'},
                            {text: 'Message Revoked ⚠️', link: '/sessions/events/message-revoked'},
                            {text: 'Message Reaction ⚠️', link: '/sessions/events/message-reaction'},
                            {text: 'QR Code ⚠️', link: '/sessions/events/qr'},
                            {text: 'Engine Event ⚠️', link: '/sessions/events/engine-event'},
                        ]
                    },
                ]
            },
            {
                text: '📤 Send Messages',
                collapsed: true,
                items: [
                    {text: 'Send Text', link: '/send-messages/send-text'},
                    {text: 'Send Image ⚠️', link: '/send-messages/send-image'},
                    {text: 'Send File ⚠️', link: '/send-messages/send-file'},
                    {text: 'Send Voice ⚠️', link: '/send-messages/send-voice'},
                    {text: 'Send Video ⚠️', link: '/send-messages/send-video'},
                    {text: 'Send Location ⚠️', link: '/send-messages/send-location'},
                    {text: 'Send Link Preview ⚠️', link: '/send-messages/send-link-preview'},
                    {text: 'Send Poll ⚠️', link: '/send-messages/send-poll'},
                    {text: 'Send List ⚠️', link: '/send-messages/send-list'},
                    {text: 'Forward Message ⚠️', link: '/send-messages/forward-message'},
                    {text: 'Send Seen', link: '/send-messages/send-seen'},
                    {text: 'Start Typing ⚠️', link: '/send-messages/start-typing'},
                    {text: 'Stop Typing ⚠️', link: '/send-messages/stop-typing'},
                ]
            },
            {
                text: '📥 Receive Messages',
                collapsed: true,
                items: [
                    {text: 'Overview ⚠️', link: '/receive-messages/overview'},
                    {text: 'Message ⚠️', link: '/receive-messages/message'},
                    {text: 'Message Any ⚠️', link: '/receive-messages/message-any'},
                    {text: 'Message Ack ⚠️', link: '/receive-messages/message-ack'},
                    {text: 'Message Revoked ⚠️', link: '/receive-messages/message-revoked'},
                    {text: 'Message Reaction ⚠️', link: '/receive-messages/message-reaction'},
                    {text: 'Message Waiting ⚠️', link: '/receive-messages/message-waiting'},
                    {text: 'Media ⚠️', link: '/receive-messages/media'},
                    {text: 'Polls ⚠️', link: '/receive-messages/polls'},
                ]
            },
            {
                text: '🆔 Profile',
                collapsed: true,
                items: [
                    {text: 'Get Profile ⚠️', link: '/profile/get-profile'},
                    {text: 'Set Profile Name ⚠️', link: '/profile/set-profile-name'},
                    {text: 'Set Profile Status ⚠️', link: '/profile/set-profile-status'},
                    {text: 'Set Profile Picture ⚠️', link: '/profile/set-profile-picture'},
                    {text: 'Delete Profile Picture ⚠️', link: '/profile/delete-profile-picture'},
                ]
            },
            {
                text: '📶 Polls',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Send Poll ⚠️', link: '/polls/api/send-poll'},
                            {text: 'Send Poll Vote ⚠️', link: '/polls/api/send-poll-vote'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Poll Vote ⚠️', link: '/polls/events/poll-vote'},
                            {text: 'Poll Vote Failed ⚠️', link: '/polls/events/poll-vote-failed'},
                        ]
                    },
                ]
            },
            {
                text: '💬 Chats',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Get All Chats ⚠️', link: '/chats/api/get-all-chats'},
                            {text: 'Get Chats Overview ⚠️', link: '/chats/api/get-chats-overview'},
                            {text: 'Get Chat Picture ⚠️', link: '/chats/api/get-chat-picture'},
                            {text: 'Mark Chat Unread ⚠️', link: '/chats/api/mark-chat-unread'},
                            {text: 'Archive Chat ⚠️', link: '/chats/api/archive-chat'},
                            {text: 'Unarchive Chat ⚠️', link: '/chats/api/unarchive-chat'},
                            {text: 'Delete Chat ⚠️', link: '/chats/api/delete-chat'},
                            {text: 'Read Messages ⚠️', link: '/chats/api/read-messages'},
                            {text: 'Get Messages ⚠️', link: '/chats/api/get-messages'},
                            {text: 'Get Message By ID ⚠️', link: '/chats/api/get-message-by-id'},
                            {text: 'Pin Message ⚠️', link: '/chats/api/pin-message'},
                            {text: 'Unpin Message ⚠️', link: '/chats/api/unpin-message'},
                            {text: 'Edit Message ⚠️', link: '/chats/api/edit-message'},
                            {text: 'Delete Message ⚠️', link: '/chats/api/delete-message'},
                            {text: 'Delete All Messages ⚠️', link: '/chats/api/delete-all-messages'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Chat Archive ⚠️', link: '/chats/events/chat-archive'},
                        ]
                    },
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
                            {text: 'All Contacts ⚠️', link: '/contacts/c.us/all-contacts'},
                            {text: 'Get Contact ⚠️', link: '/contacts/c.us/get-contact'},
                            {text: 'Update Contact ⚠️', link: '/contacts/c.us/update-contact'},
                            {text: 'Check Exists', link: '/contacts/c.us/check-exists'},
                            {text: 'Get About ⚠️', link: '/contacts/c.us/get-about'},
                            {text: 'Profile Picture ⚠️', link: '/contacts/c.us/profile-picture'},
                            {text: 'Block Contact ⚠️', link: '/contacts/c.us/block-contact'},
                            {text: 'Unblock Contact ⚠️', link: '/contacts/c.us/unblock-contact'},
                        ]
                    },
                    {
                        text: 'LIDs',
                        collapsed: false,
                        items: [
                            {text: 'Known LIDs ⚠️', link: '/contacts/lids/known-lids'},
                            {text: 'Count of LIDs ⚠️', link: '/contacts/lids/count-lids'},
                            {text: 'Phone Number by LID ⚠️', link: '/contacts/lids/phone-number-by-lid'},
                            {text: 'LID by Phone Number ⚠️', link: '/contacts/lids/lid-by-phone-number'},
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
                        collapsed: true,
                        items: [
                            {text: 'Preview Channel Messages ⚠️', link: '/channels/api/channels/preview-messages'},
                            {text: 'Create Channel ⚠️', link: '/channels/api/channels/create-channel'},
                            {text: 'Get Channel ⚠️', link: '/channels/api/channels/get-channel'},
                            {text: 'List Channels ⚠️', link: '/channels/api/channels/list-channels'},
                            {text: 'Delete Channel ⚠️', link: '/channels/api/channels/delete-channel'},
                            {text: 'Get Messages ⚠️', link: '/channels/api/channels/get-messages'},
                        ]
                    },
                    {
                        text: 'Search API',
                        collapsed: true,
                        items: [
                            {text: 'Search by View ⚠️', link: '/channels/api/search/search-by-view'},
                            {text: 'Search by Text ⚠️', link: '/channels/api/search/search-by-text'},
                            {text: 'Views for Search ⚠️', link: '/channels/api/search/get-views'},
                            {text: 'Countries for Search ⚠️', link: '/channels/api/search/get-countries'},
                            {text: 'Categories for Search ⚠️', link: '/channels/api/search/get-categories'},
                        ]
                    },
                ]
            },
            {
                text: '🟢 Status',
                collapsed: true,
                items: [
                    {text: 'Send Text Status', link: '/status/send-text-status'},
                    {text: 'Send Image Status', link: '/status/send-image-status'},
                ]
            },
            {
                text: '👥 Groups',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Create Group ⚠️', link: '/groups/api/create-group'},
                            {text: 'List Groups ⚠️', link: '/groups/api/list-groups'},
                            {text: 'Count Groups ⚠️', link: '/groups/api/count-groups'},
                            {text: 'Get Join Info ⚠️', link: '/groups/api/get-join-info'},
                            {text: 'Join Group ⚠️', link: '/groups/api/join-group'},
                            {text: 'Get Group ⚠️', link: '/groups/api/get-group'},
                            {text: 'Delete Group ⚠️', link: '/groups/api/delete-group'},
                            {text: 'Leave Group ⚠️', link: '/groups/api/leave-group'},
                            {text: 'Get Group Picture ⚠️', link: '/groups/api/get-group-picture'},
                            {text: 'Update Group Picture ⚠️', link: '/groups/api/update-group-picture'},
                            {text: 'Delete Group Picture ⚠️', link: '/groups/api/delete-group-picture'},
                            {text: 'Update Group Description ⚠️', link: '/groups/api/update-group-description'},
                            {text: 'Update Group Subject ⚠️', link: '/groups/api/update-group-subject'},
                            {text: 'Get Invite Code ⚠️', link: '/groups/api/get-invite-code'},
                            {text: 'Revoke Invite Code ⚠️', link: '/groups/api/revoke-invite-code'},
                            {text: 'Get Info Admin Only ⚠️', link: '/groups/api/get-security-info-admin-only'},
                            {text: 'Set Info Admin Only ⚠️', link: '/groups/api/set-security-info-admin-only'},
                            {text: 'Get Messages Admin Only ⚠️', link: '/groups/api/get-security-messages-admin-only'},
                            {text: 'Set Messages Admin Only ⚠️', link: '/groups/api/set-security-messages-admin-only'},
                            {text: 'Get Participants ⚠️', link: '/groups/api/get-participants'},
                            {text: 'Add Participant ⚠️', link: '/groups/api/add-participant'},
                            {text: 'Remove Participant ⚠️', link: '/groups/api/remove-participant'},
                            {text: 'Promote Participant ⚠️', link: '/groups/api/promote-participant'},
                            {text: 'Demote Participant ⚠️', link: '/groups/api/demote-participant'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Group Join (v2) ⚠️', link: '/groups/events/group-v2-join'},
                            {text: 'Group Leave (v2) ⚠️', link: '/groups/events/group-v2-leave'},
                            {text: 'Group Participants (v2) ⚠️', link: '/groups/events/group-v2-participants'},
                            {text: 'Group Update (v2) ⚠️', link: '/groups/events/group-v2-update'},
                        ]
                    },
                ]
            },
            {
                text: '✅ Presence',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Get All Presence ⚠️', link: '/presence/api/get-presence'},
                            {text: 'Set Presence', link: '/presence/api/set-presence'},
                            {text: 'Subscribe to Presence ⚠️', link: '/presence/api/subscribe-presence'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Presence Update ⚠️', link: '/presence/events/presence-update'},
                        ]
                    },
                ]
            },
            {
                text: '🏷️ Labels',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Get All Labels ⚠️', link: '/labels/api/get-all-labels'},
                            {text: 'Create Label ⚠️', link: '/labels/api/create-label'},
                            {text: 'Update Label ⚠️', link: '/labels/api/update-label'},
                            {text: 'Delete Label ⚠️', link: '/labels/api/delete-label'},
                            {text: 'Get Chats by Label ⚠️', link: '/labels/api/get-chats-by-label'},
                            {text: 'Get Labels by Chat ⚠️', link: '/labels/api/get-labels-by-chat'},
                            {text: 'Put Labels to Chat ⚠️', link: '/labels/api/put-labels-to-chat'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Label Upsert ⚠️', link: '/labels/events/label-upsert'},
                            {text: 'Label Deleted ⚠️', link: '/labels/events/label-deleted'},
                            {text: 'Label Chat Added ⚠️', link: '/labels/events/label-chat-added'},
                            {text: 'Label Chat Deleted ⚠️', link: '/labels/events/label-chat-deleted'},
                        ]
                    },
                ]
            },
            {
                text: '📅 Event Message',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Send Event Message ⚠️', link: '/event-message/api/send-event-message'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Event Response ⚠️', link: '/event-message/events/event-response'},
                            {text: 'Event Response Failed ⚠️', link: '/event-message/events/event-response-failed'},
                        ]
                    },
                ]
            },
            {
                text: '📞 Calls',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Configure Calls ⚠️', link: '/calls/api/configure-calls'},
                        ]
                    },
                    {
                        text: 'Events',
                        collapsed: true,
                        items: [
                            {text: 'Call Accepted ⚠️', link: '/calls/events/call-accepted'},
                            {text: 'Call Rejected ⚠️', link: '/calls/events/call-rejected'},
                        ]
                    },
                ]
            },
            {
                text: '🔭 Observability',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'Ping ⚠️', link: '/observability/api/ping'},
                            {text: 'Get Server Version ⚠️', link: '/observability/api/get-server-version'},
                            {text: 'Get Server Environment ⚠️', link: '/observability/api/get-server-environment'},
                            {text: 'Get Server Status ⚠️', link: '/observability/api/get-server-status'},
                            {text: 'Restart Server ⚠️', link: '/observability/api/restart-server'},
                            {text: 'Health Check ⚠️', link: '/observability/api/health-check'},
                            {text: 'Node Heapsnapshot ⚠️', link: '/observability/api/debug-heapsnapshot'},
                            {text: 'Node CPU Profiling ⚠️', link: '/observability/api/debug-cpu-profiling'},
                            {text: 'Browser Trace ⚠️', link: '/observability/api/debug-browser-trace'},
                        ]
                    },
                ]
            },
            {
                text: 'DTOs',
                collapsed: true,
                items: [
                    {text: 'Text Status Data', link: '/reference/dto/text-status-data'},
                    {text: 'Image Status Data', link: '/reference/dto/image-status-data'},
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
