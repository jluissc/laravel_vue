<template>
    <div class="bg-white p-5 w-full sm:w-8/12 md:w-5/12">
        <h1 class="text-3xl text-center font-bold py-4 text-gray-800">Create Task</h1>
        <form action="" method="post" v-on:submit.prevent="saveTask()">
            <div class="d-block flex px-2 py-4">
                <input type="text"
                v-model="task" 
                class="text-xl p-2 mr-2 w-10/12 border-b-2 border-green-500" 
                placeholder="New task"
                name="task">

                <input type="submit" value="Save"
                class="bg-green-500 w-2/12 text-white">
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return{
                task : '',
            }
        },
        methods:{
            saveTask(){
                axios.post('/tasks',{title : this.task})
                    .then(resp => {console.log(resp)})
                    .catch(error => {console.log(error.resp)})
                this.task = ''
                this.$router.push('/'); 
            }
        }
    }
</script>