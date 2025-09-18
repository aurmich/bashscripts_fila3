<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
const dotenvExpand = require('dotenv-expand');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));
>>>>>>> 0d55b583 (first)
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> 9cec72d6 (first)
=======
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> 2df6fbc8 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));
>>>>>>> 8fc3049b (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> 7e417e87 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> 53542950 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> 26424c5e (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> c8cd1ec3 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));
>>>>>>> b7483fd0 (first)

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 53542950 (first)
=======
>>>>>>> 26424c5e (first)
=======
>>>>>>> c8cd1ec3 (first)
=======
>>>>>>> b7483fd0 (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
export default defineConfig(
    {
        build: {
            outDir: '../../public/build-ui',
=======
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 8fc3049b (first)
export default defineConfig(
    {
        build: {
            outDir: '../../public/build-user',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> c088001a (first)
=======
>>>>>>> 0d55b583 (first)
=======
export default defineConfig(
    {
        build: {
            outDir: '../../public/build-setting',
>>>>>>> 9cec72d6 (first)
=======
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(
    {
        build: {
            outDir: '../../public/build-media',
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
            emptyOutDir: true,
            manifest: true,
        },
        plugins: [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            laravel(
                {
                    publicDirectory: '../../public',
<<<<<<< HEAD
<<<<<<< HEAD
                    buildDirectory: 'build-ui',
=======
                    buildDirectory: 'build-user',
>>>>>>> c088001a (first)
=======
                    buildDirectory: 'build-user',
>>>>>>> 0d55b583 (first)
=======
            laravel(
                {
                    publicDirectory: '../../public',
                    buildDirectory: 'build-media',
>>>>>>> c986cc10 (first)
=======
            laravel(
                {
                    publicDirectory: '../../public',
                    buildDirectory: 'build-user',
>>>>>>> 8fc3049b (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> 0d55b583 (first)
=======
        laravel(
            {
                publicDirectory: '../../public',
                buildDirectory: 'build-setting',
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
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======

//export const paths = [
//    'Modules/$STUDLY_NAME$/resources/assets/sass/app.scss',
//    'Modules/$STUDLY_NAME$/resources/assets/js/app.js',
//];
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
=======
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 53542950 (first)
=======
>>>>>>> 26424c5e (first)
=======
>>>>>>> c8cd1ec3 (first)
=======
>>>>>>> b7483fd0 (first)
