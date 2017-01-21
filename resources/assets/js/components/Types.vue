<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
        <pie-chart v-if=all :chartData=all.data :title=all.title />
      </div>
    </div>
  </div>
</template>

<script>
  import LineChart from './charts/Line.vue';
  import PieChart from './charts/Pie.vue';

  export default {

    components: { LineChart, PieChart },

    data() {
      return {
        all: {
          title: 'Typy seansów',
          data: {}
        },
        cinemas: []
      }
    },

    mounted () {
      this.loadChartData();
    },

    methods: {
      loadChartData () {
        this.$http.get('/api/charts/types')
          .then(response => {
            return response.body;
          })
          .then(data => {
            this.all.data = data.all;
            this.cinemas = data.cinemas;

            let backgroundColor = [];

            this.all.data.datasets.forEach((dataset) => {
              dataset.data.forEach(() => {
                backgroundColor.push(randomHexColor());
              });

              dataset.backgroundColor = backgroundColor;
              backgroundColor = [];
            })
        })
          .then(() => {
            console.log(this.cinemas);
          });
      }
    }
  }
</script>
