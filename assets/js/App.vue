<template>
    <div>
        <Navbar/>
        <!-- Отборажает нужную вьюху -->
        <router-view/>
    </div>
</template>

<script>

import Navbar from './components/layouts/Navbar'

export default {
    name: 'app',
    components: {
        Navbar
    }
}
</script>

<style>

</style>