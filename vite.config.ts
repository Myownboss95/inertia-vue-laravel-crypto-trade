import { defineConfig, loadEnv } from 'vite'
import laravel, { callArtisan } from 'vite-plugin-laravel'
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
        laravel({
            watch: [
                {
                    condition: file => file.includes('routes/') && file.endsWith('.php'),
                    handle: () => callArtisan('ziggy:generate')
                }
            ]
        }),
    ],
    server: {
        host: domain,
        https: {
            key: fs.readFileSync(`${certPath}.key`),
            cert: fs.readFileSync(`${certPath}.crt`),
        }
    }
})


