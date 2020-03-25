<template>
    <div class="row mt-5 dashboard_home" id="dashboard-full-width">
        <div class="col-lg-3 col-sm-12 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">{{count_cities}}</h3>
                    <p class="card-text">Städte</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">{{count_zip_codes}}</h3>
                    <p class="card-text">Postleitzahlen</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">{{count_states}}</h3>
                    <p class="card-text">Bundesländer</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">{{count_teams}}</h3>
                    <p class="card-text">Einkaufshelfer-Teams</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DashBoardComponent",
        data() {
            return {
                count_cities: 0,
                count_states: 0,
                count_zip_codes: 0,
                count_teams: 0,
            }
        },
        created() {
            this.getStats();
        },
        mounted() {
        },
        methods: {
            getStats: async function () {
                const response = await axios.get('/api/dashboard');
                this.count_cities = response.data.data.count_cities;
                this.count_states = response.data.data.count_states;
                this.count_zip_codes = response.data.data.count_zip_codes;
                this.count_teams = response.data.data.count_teams;

            }
        },

    }
</script>

<style scoped>

</style>
