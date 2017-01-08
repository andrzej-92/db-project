<template>
  <div class="container-expanded">
    <line-chart :chartData=sales_value.data :options=sales_value.options :title=sales_value.title />
    <bar-chart :chartData=sales_count.data :options=sales_count.options :title=sales_count.title />

    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
          <pie-chart :chartData=sales_count.data :options=sales_count.options :title=sales_count.title />
      </div>
    </div>

  </div>
</template>

<script>
  import LineChart from './charts/Line.vue';
  import BarChart from './charts/Bar.vue';
  import PieChart from './charts/Pie.vue';

  export default {

    components: { LineChart, BarChart, PieChart },

    data() {
      return {
        sales_value: {
          title: 'Wartość sprzedaży - Brutto PLN',
          data: {},
          options: {}
        },
        sales_count: {
          title: 'Ilość sprzedaży',
          data: {},
          options: {}
        }
      }
    },

    mounted () {
      this.loadChartData();
    },

    methods: {
      loadChartData () {
        this.$http.get('/api/charts')
          .then(response => {
            return response.body;
          })
          .then(data => {
            this.sales_value.data = data.sales_value;

            let backgroundColor = [];

            if (data.sales_count.datasets && data.sales_count.datasets.length) {
              data.sales_count.datasets.forEach((dataset) => {
                dataset.data.forEach(() => {
                  backgroundColor.push(this.randomHexColor());
                })
              });
            }

            this.sales_count.data = data.sales_count;
            this.sales_count.data.datasets[0].backgroundColor = backgroundColor;
          })
      },

      randomHexColor () {
        return '#'+Math.floor(Math.random()*16777215).toString(16);
      }
    }
  }
</script>
