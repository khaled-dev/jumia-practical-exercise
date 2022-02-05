<template>
    <div>
        <br/>

        <div class="form-group">

            <select class="form-control col-sm-5 form-check-inline" v-on:change="reloadCustomers($event)" data-param='country_code'>
                <option value=""> Choose Country </option>
                <option v-for="country in countries" v-bind:value="country.code">
                    {{ country.name }}
                </option>
            </select>

            <select class="form-control col-sm-5 form-check-inline" v-on:change="reloadCustomers($event)" data-param='is_phone_valid'>
                <option value=""> Choose mobile validation state </option>
                <option value="1"> valid mobile number </option>
                <option value="0"> invalid mobile number </option>
            </select>

        </div>

        <br/>

        <table class="table">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>country code</th>
                    <th>Phone num</th>
                </tr>
            </thead>
            <tbody v-for="customer in customers" :key="customer.id">
                <tr>
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.country }}</td>
                    <td>{{ customer.state }}</td>
                    <td>{{ customer.code }}</td>
                    <td>{{ customer.phone }}</td>
                </tr>
            </tbody>
        </table>

        <br/>

        <b-pagination
            v-model="page"
            :total-rows="rows"
            :per-page="perPage"
            @change="handlePageChange"
        ></b-pagination>

    </div>
</template>
<script>

import {API_COUNTRIES_URL, API_CUSTOMERS_URL} from "../config";

export default {
    created() {
      this.loadCountries()
      this.loadCustomers()
    },

    methods: {
      loadCountries() {
        this.axios.get(API_COUNTRIES_URL).then(r => {
          this.countries = r.data.data.countries
        })
      },

      loadCustomers() {
        this.axios.get(this.customersUrl, {params: this.params}).then(r => {
          this.customers  = r.data.data.customers
          this.page       = r.data.meta.current_page
          this.rows       = r.data.meta.total
          this.perPage    = r.data.meta.per_page
        })
      },

      reloadCustomers(e) {
        let key = e.target.getAttribute('data-param')
        let value = e.target.value

        if (! value) {
          this.params[key] = null
        } else {
          this.params[key] = value
        }

        this.loadCustomers()
      },

      handlePageChange(page) {
          this.params.page = page
          this.loadCustomers()
      }
    },

    data() {
      return {
        page: 1,
        rows: 0,
        perPage: 3,
        customers: [],
        countries: [],
        customersUrl: API_CUSTOMERS_URL,
        params: {},
      }
    }
};
</script>
