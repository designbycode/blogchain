import axios from 'axios'
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm'
import ApexCharts from 'apexcharts'

import.meta.glob(['../img/**/*.{webp,png,svg,jpeg,jpg}'])

window.axios = axios
window.ApexCharts = ApexCharts
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

Livewire.start()

var options = {
    chart: {
        type: 'area',
        height: 120,
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        curve: 'smooth',
        width: 2,
        colors: ['#615FFF'], // Stroke color
    },
    grid: {
        show: false,
    },
    xaxis: {
        labels: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        show: false,
    },
    tooltip: {
        enabled: false,
    },
    series: [
        {
            name: 'Data',
            data: [10, 15, 12, 20, 18, 25, 22],
        },
    ],
    fill: {
        type: 'gradient',
        colors: ['#615FFF'],
        gradient: {
            shadeIntensity: 0.5,
            opacityFrom: 0.6,
            opacityTo: 0.0,
            stops: [0, 100],
        },
    },
}

const chart = new ApexCharts(document.querySelector('#chart'), options)

chart.render()
