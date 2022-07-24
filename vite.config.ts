import { defineConfig, loadEnv } from 'vite'
import laravel from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import * as fs from 'fs'
import os from 'node:os'
import {exec} from 'child_process'

const domain = 'binotomo.test';
let certPath = `${os.homedir()}/.config/valet/Certificates/${domain}`;


export default defineConfig({
	plugins: [
		inertia(),
		vue(),
        laravel(),
        {
        name: 'ziggy',
        enforce: 'post',
        handleHotUpdate({ server, file }) {
            if (file.includes('/routes/') && file.endsWith('.php')) {
                exec('php artisan ziggy:generate', (error, stdout) => error === null && console.log(`  > Ziggy routes generated!`))
            }
        }
    }
    ],
    server: {
        host: domain,
        https: {
            key: fs.readFileSync(`${certPath}.key`),
            cert: fs.readFileSync(`${certPath}.crt`),
        }
    }
})
