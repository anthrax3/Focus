<template>
    <div class="task-list">
        <h1>My Tasks</h1>
        <ul class="list-group">
            <task v-for="task in tasks" :task="task"></task>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: []
            }
        },

        components: {
            task: require('./Task.vue')
        },

        created() {
            this.fetchTasks();
        },

        methods: {
            api() {
                return this.$resource('/api/tasks/{/id}')
            },
            fetchTasks() {
                this.api().get()
                        .then(response => response.json())
                        .then(json => {
                            this.tasks = json;
                        })
            }
        }
    }
</script>
