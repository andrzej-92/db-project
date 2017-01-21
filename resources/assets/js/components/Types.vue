<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
        <pie-chart v-if=all :chartData=all.data :title=all.title />
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-xs-12 col-md-6 col-lg-4 cinema-stats-box" v-for="cinema, key in cinemas">
        <div class="panel panel-default">
          <div class=panel-heading>
            <h4 class="text-center">
              {{ key == 'ALL' ? 'Całość: ' : key }}
            </h4>
          </div>

          <div v-for="type, key in cinema">
            <div class="row cinema-stats-row" style="margin: 0;">
              <div class="col-xs-6 panel-title">
                <h5> {{ key == 'ALL' ? 'W sumie: ' : key }}</h5>
              </div>
              <div class="col-xs-6 text-right cinema-panel-stats">
                <div>
                  <span>{{ type.brutto }} zł</span>
                </div>
                <div>
                  <span>{{ type.count }} sztuk</span>
                </div>
              </div>
            </div>
          </div>
        </div>
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
        });
      }
    }
  }
</script>
