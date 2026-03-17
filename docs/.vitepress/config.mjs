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
                    {text: 'About waha', link: '/introduction/about-waha'},
                    {text: 'Changelog', link: '/introduction/changelog'},
                ]
            },
            {
                text: 'Sessions',
                collapsed: true,
                items: [
                    {
                        text: 'API',
                        collapsed: true,
                        items: [
                            {text: 'List Sessions ⚠️', link: '/sessions/api/list-sessions'},
                            {text: 'Get Session ⚠️', link: '/sessions/api/get-session'},
                            {text: 'Create Session ⚠️', link: '/sessions/api/create-session'},
                            {text: 'Update Session ⚠️', link: '/sessions/api/update-session'},
                            {text: 'Delete Session ⚠️', link: '/sessions/api/delete-session'},
                            {text: 'Start Session ⚠️', link: '/sessions/api/start-session'},
                            {text: 'Stop Session ⚠️', link: '/sessions/api/stop-session'},
                            {text: 'Restart Session ⚠️', link: '/sessions/api/restart-session'},
                            {text: 'Logout Session ⚠️', link: '/sessions/api/logout-session'},
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
                text: 'Send Messages',
                collapsed: true,
                items: [
                    {text: 'Send Text ⚠️', link: '/send-messages/send-text'},
                    {text: 'Send Image ⚠️', link: '/send-messages/send-image'},
                    {text: 'Send File ⚠️', link: '/send-messages/send-file'},
                    {text: 'Send Voice ⚠️', link: '/send-messages/send-voice'},
                    {text: 'Send Video ⚠️', link: '/send-messages/send-video'},
                    {text: 'Send Location ⚠️', link: '/send-messages/send-location'},
                    {text: 'Send Link Preview ⚠️', link: '/send-messages/send-link-preview'},
                    {text: 'Send Poll ⚠️', link: '/send-messages/send-poll'},
                    {text: 'Send List ⚠️', link: '/send-messages/send-list'},
                    {text: 'Forward Message ⚠️', link: '/send-messages/forward-message'},
                    {text: 'Send Seen ⚠️', link: '/send-messages/send-seen'},
                    {text: 'Start Typing ⚠️', link: '/send-messages/start-typing'},
                    {text: 'Stop Typing ⚠️', link: '/send-messages/stop-typing'},
                ]
            },
            {
                text: '📥 Receive Messages',
                collapsed: true,
                items: [
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
                text: '👤 Contacts',
                collapsed: true,
                items:[
                    {
                        text: 'c.us',
                        collapsed: true,
                        items: [
                            {text: 'All Contacts ⚠️', link: '/contacts/c.us/all-contacts'},
                            {text: 'Get Contact ⚠️', link: '/contacts/c.us/get-contact'},
                            {text: 'Update Contact ⚠️', link: '/contacts/c.us/update-contact'},
                            {text: 'Check Exists ✅', link: '/contacts/c.us/check-exists'},
                            {text: 'Get About ⚠️', link: '/contacts/c.us/get-about'},
                            {text: 'Profile Picture ⚠️', link: '/contacts/c.us/profile-picture'},
                            {text: 'Block Contact ⚠️', link: '/contacts/c.us/block-contact'},
                            {text: 'Unblock Contact ⚠️', link: '/contacts/c.us/unblock-contact'},
                        ]
                    },
                    {
                        text: 'LIDs',
                        collapsed: true,
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
                text: 'Status',
                collapsed: true,
                items: [
                    {text: 'Send Text Status', link: '/status/send-text-status'},
                    {text: 'Send Image Status', link: '/status/send-image-status'},
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
