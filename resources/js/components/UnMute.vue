<template>
    <a :id="userId" class="dropdown-item cursor-pointer"
       @click="unmuteUser">Unmute</a>
</template>

<script>
export default {
    name: "UnMute",

    props: ["userId", "message"],

    methods: {
        unmuteUser(event) {
            if (confirm("Do you really want to unmute " + this.message.name)) {
                this.message.status_id = null;
                let postData = {
                    id: event.target.id,
                    action: 'unmute'
                }
                axios.post('dashboard/admin/users/' + event.target.id + '/updateStatus', postData).then(response => {
                });
                this.$emit('unmute', [parseInt(event.target.id), null]);
            }
        },
    }
}
</script>

<style scoped>

</style>
