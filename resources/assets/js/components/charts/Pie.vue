<template>
  <div class="container-expanded">
    <div class="row" v-if=title>
      <h3>
        {{ title }}
      </h3>
    </div>
    <div class="row">
        <canvas v-if=chartData ref="canvas" width="4" height="3"></canvas>
        <div class="loader" v-if=!chartData></div>
    </div>
  </div>
</template>

<script>
  import { VueCharts } from 'vue-chartjs'

  export default VueCharts.Pie.extend({
    mixins: [VueCharts.mixins.reactiveProp],
    props: ["chartData", "options", "title"],

    mounted () {
      if (this.chartData) {
        this.renderChart(this.chartData, this.options);
      }
    }
  })
</script>