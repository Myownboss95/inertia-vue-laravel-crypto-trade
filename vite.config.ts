import { defineConfig, loadEnv } from 'vite'
import laravel, { callArtisan, callShell } from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import * as fs from 'fs'
import os from 'node:os'
import process from 'node:process'

const domain = 'cryptowalletnew.test';
let certPath = `${os.homedir()}/Library/Application Support/Herd/config/valet/Certificates/${domain}`;

export default defineConfig(({ mode }) => {
    let env = loadEnv(mode, process.cwd());

    function sslData() {
        return (!fs.existsSync(certPath + '.crt') || !fs.existsSync(certPath + '.key'))
            ? false
            : {
                key: fs.readFileSync(`${certPath}.key`),
                cert: fs.readFileSync(`${certPath}.crt`),
            }

    }

    return {
        plugins: [
            inertia(),
            vue(),
            laravel({
                watch: [
                    {
                        condition: file => file.includes('routes/') && file.endsWith('.php'),
                        handle: () => callShell('php artisan ziggy:generate')
                    }
                ]
            }),
        ],
        server: {
            https: sslData()
        }
    }
})


