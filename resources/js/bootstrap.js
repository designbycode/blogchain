import axios from 'axios'
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm'

import.meta.glob(['../img/**/*.{webp,png,svg,jpeg,jpg}'])

window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

Livewire.start()
