import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // CRUD AJAX
                'resources/js/pages/activity-type.js',
                'resources/js/pages/time-log.js',
                'resources/js/pages/timesheet.js',
            ],
            refresh: true,
        }),
    ],
});
