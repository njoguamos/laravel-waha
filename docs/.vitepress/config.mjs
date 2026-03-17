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
                text: 'Contacts',
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
