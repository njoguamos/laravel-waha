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
            { defer: '', 'data-domain': 'waha.njoguamos.me.ke', src: 'https://stats.njoguamos.com/js/script.js' }
        ],
    ],
    themeConfig: {
        search: {
            provider: 'local'
        },

        nav: [
            {text: 'Home', link: '/'},
            {text: 'Guide', link: '/introduction/getting-started'},
        ],

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    {text: 'About waha', link: '/introduction/about-waha'},
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
