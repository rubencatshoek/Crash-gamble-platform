<template>
    <a :id="userId" class="dropdown-item cursor-pointer" @click="banUser">Ban</a>
</template>

<script>
export default {
    name: "Ban",

    props: ["userId", "message"],

    methods: {
        banUser(event) {
            if (confirm("Do you really want to ban " + this.message.name)) {
                this.message.status_id = 1;
                let postData = {
                    id: event.target.id,
                    action: 'ban'
                }
                axios.post('dashboard/admin/users/' + event.target.id + '/updateStatus', postData).then(response => {
                });
                this.$emit('ban', [parseInt(event.target.id), 1]);
            }
        },
    }
}
</script>

<style scoped>

</style>
