<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Booking List</div>

                    <div class="card-body">
                        <b-table striped hover :items="bookings.items" :fields="table_head"></b-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
    data() {
    return {
            bookings: {items: []},
            table_head: [
                {key: 'name', label: 'Name'},
                {key: 'email', label: 'Email'},
                {key: 'type', label: 'Type'},
                {key: 'status', label: 'Status'},
                {key: 'created_at', label: 'Created at'}
            ]
        }
    },
    created() {
        this.bookings.items = this.get_bookings()
        setInterval(() => {
            this.bookings.items = this.get_bookings()
        }, 5000)

    },
    methods: {
        get_bookings: () => {
            var booking_items = [];
            axios.get(app_url + `/api/bookings/list`)
            .then(response => {
                for(var i in response.data.data) {
                    booking_items.push({
                        name: response.data.data[i].name,
                        email: response.data.data[i].email,
                        type: response.data.data[i].type,
                        status: response.data.data[i].status,
                        created_at: response.data.data[i].created_at
                    })
                    console.log(booking_items[i])
                }
            })
            .catch(e => {
                console.log(e)
            })
            return booking_items
        }
    }
  }
</script>
