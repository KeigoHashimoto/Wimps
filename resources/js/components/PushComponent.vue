<template>
  <div>
    <p v-show="message" class="push">
        <span>新着あり</span>
    </p>
  </div>
</template>

<script>
import Echo from 'laravel-echo';

export default {
    data(){
        return{
            message:false,
        };
    },

    methods:{
        push(){
            this.message = true;
        }
    },

    mounted(){
        window.Echo.channel('whinePost').listen('WhinePostEvent',e =>{
            this.push();
        })
    }
}
</script>

<style>

</style>