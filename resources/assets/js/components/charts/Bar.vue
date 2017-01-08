<template>
  <div class="container-fluid">
    <div class="row" v-if=title>
      <h3>
        {{ title }}
      </h3>
    </div>
    <div class="row">
        <div class="panel panel-default">
          <canvas v-if=chartData ref="canvas" width="13" height="4"></canvas>
          <div class="loader" v-if=!chartData></div>
        </div>
    </div>
  </div>
</template>

<script>
    import { VueCharts } from 'vue-chartjs'

    export default VueCharts.Bar.extend({
      mixins: [VueCharts.mixins.reactiveProp],
      props: ["chartData", "options", "title"],

      data () {
        return {
          defaultOptions: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                },
                gridLines: {
                  display: true
                }
              }],
              xAxes: [ {
                gridLines: {
                  display: true
                },
                categoryPercentage: 0.5,
                barPercentage: 0.5
              }]
            }
          }
        }
      },

      mounted () {
        if (this.chartData) {
          this.renderChart(
            this.chartData,
            Object.assign(this.defaultOptions, this.options)
          );
        }
      }
    })
</script>