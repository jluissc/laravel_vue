<template>
    <div class="bg-white p-5 w-full sm:w-8/12 md:w-5/12">
        <h1>Tasks List</h1>
        <div v-for="task in tasks" :key="task.id"
            class="flex justify-content-center p-2 border-b-2 border-gray-300 my-2">

            <!-- <input type="checkbox" @click="completeTask(task)" v-if="task.completed" checked> 
            <input type="checkbox" @click="completeTask(task)" v-if="!task.completed" >  -->
            <input type="checkbox" @click="completeTask(task)" :checked="checkCompleted(task.completed)"> 
            <p class="mx-2 mt-1 text-gray-900">{{task.title}}</p>

            <div class="ml-auto flex">
                <router-link :to="'/edit/'+task.id" width="28" height="28">
                    <svg class="h-8 w-8 text-green-700"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>

                </router-link>

                <form action="" v-on:submit.prevent="deleteTask(task.id)">
                    <button type="submit">
                        <svg class="h-6 w-6 text-red-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                    </button>
                </form>
            </div>
        </div>
        <!-- <Pagination :data="tasks" @pagination-change-page="getTasks" /> -->
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                tasks : [], 
                completed : 0
            }           
        },
        created(){
            this.getTasks();
        },
        methods: {
            deleteTask(id){
                axios.delete('/tasks/'+id)
                .then(resp => console.log(resp.data))
                .catch(error => {console.log(error.resp)})
                this.getTasks();
            },
            getTasks(){
                axios.get('/tasks')
                .then(resp => {
                    this.tasks = resp.data
                    console.log(resp.data)
                    console.log(this.tasks)
                })
                .catch(error => {console.log(error.resp)})
            },
            completeTask(task){
                // alert(task.completed)
                this.completed = task.completed ? 0 : 1;
                axios.put('/tasks/'+task.id,{title : task.title, completed : this.completed})
                    .then(resp => {console.log(resp)})
                    .catch(error => {console.log(error.resp)})

            },
            checkCompleted(status){
                return status ? true : false;
            }
        }
    }
</script>