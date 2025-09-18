const dotenvExpand = require('dotenv-expand');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));
>>>>>>> a8f30311 (first)
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));
>>>>>>> bbec4378 (first)
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));
>>>>>>> c088001a (first)

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
export default defineConfig({
    build: {
        outDir: '../../public/build-user',
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build-user',
            input: [
                __dirname + '/resources/assets/sass/app.scss',
                __dirname + '/resources/assets/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
<<<<<<< HEAD
=======
export default defineConfig(
    {
        build: {
            outDir: '../../public/build-ui',
=======
export default defineConfig(
    {
        build: {
            outDir: '../../public/build-user',
>>>>>>> c088001a (first)
            emptyOutDir: true,
            manifest: true,
        },
        plugins: [
            laravel(
                {
                    publicDirectory: '../../public',
<<<<<<< HEAD
                    buildDirectory: 'build-ui',
=======
                    buildDirectory: 'build-user',
>>>>>>> c088001a (first)
                    input: [
                        __dirname + '/resources/assets/sass/app.scss',
                        __dirname + '/resources/assets/js/app.js'
                    ],
                    refresh: true,
                }
            ),
        ],
    }
);
<<<<<<< HEAD
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
