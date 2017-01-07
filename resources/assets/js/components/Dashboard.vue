<template>
  <div class="container-expanded">
      <line-chart :chartData=sales_value.data :options=sales_value.options :title=sales_value.title />
      <bar-chart :chartData=sales_count.data :options=sales_count.options :title=sales_count.title />
  </div>
</template>

<script>
  import LineChart from './charts/Line.vue';
  import BarChart from './charts/Bar.vue';

  export default {

    components: { LineChart, BarChart },

    data() {
      return {
        sales_value: {
          title: 'Wartość sprzedaży - Brutto PLN',
          data: {},
          options: {},
        },
        sales_count: {
          title: 'Ilość sprzedaży',
          data: {},
          options: {},
        },
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
            this.sales_count.data = data.sales_count;
        })
      }
    }
  }
</script>
