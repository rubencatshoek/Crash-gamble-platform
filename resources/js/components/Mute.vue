<template>
    <a :id="userId" class="dropdown-item cursor-pointer" @click="muteUser">Mute</a>
</template>

<script>
export default {
    name: "Mute",

    props: ["userId", "message"],

    methods: {
        muteUser(event) {
            if (confirm("Do you really want to mute " + this.message.name)) {
                this.message.status_id = 2;
                let postData = {
                    id: event.target.id,
                    action: 'mute'
                }
                axios.post('dashboard/admin/users/' + event.target.id + '/updateStatus', postData).then(response => {
                });
                this.$emit('muted', [parseInt(event.target.id), 2]);
            }
        },
    }
}
</script>

<style scoped>

</style>
