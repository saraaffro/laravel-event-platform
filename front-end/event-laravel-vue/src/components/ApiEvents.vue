<script>
import axios from 'axios';
export default{
    name: 'ApiEvents',
    data(){
        return{
            events: [],
        }
    },
    mehtods:{

    },
    mounted(){
        axios.get('http://localhost:8000/api/v1/events')
        .then(res=> {
            console.log(res.data);
            this.events = res.data.events;
        })
        .catch(err=> {
            console.log(err);
        })
    }
}
</script>

<template>
  <div class="container">
    <h1 class="m-3 text-center">Events</h1>
    <div class="row d-flex gy-4">
       <div class="col-4" v-for="event in events" :key="event.id">
            <div class="card">
                <div class="card-title">
                    <strong>{{ event.name }}</strong>
                </div>
                <div class="card-text">
                    <p>Description: {{ event.description }}</p>
                    <p>Date: {{ event.date }}</p>
                    <p>Location: {{ event.location }}</p>
                    <p>User: {{ event.user.name }}</p>
                   
                    <div v-if="event.tags && event.tags.length > 0">
                        <h6>Tags:</h6>
                        <template v-for="(tag, index) in event.tags" :key="index">
                            <em>{{ tag.name }} 
                                <span v-if="index < event.tags.length -1">- </span></em>
                        </template>
                    </div>
                    
                </div>
            </div>
       </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@use '../scss/general.scss' as *;

.card{
    height: 400px;
    padding: 15px;
}
</style>