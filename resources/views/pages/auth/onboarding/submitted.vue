<template>
    <Head title="Verification Submitted" />
    <div class="py-5 px-3">
        <p class="text-center">
            <div class="mb-4">
                <i class="far fa-check-circle text-success" style="font-size: 80px"></i>
            </div>
            Thank you for submitting your verification data. Our team is currently reviewing it. We will contact you once the review process is complete. Thank you for your patience.
        </p>
    </div>
    <div class="d-flex justify-content-center gap-5">
        <a :href="route('front.index')" class="font-size-20 text-primary"><i class="mdi mdi-home" title="Go back home"></i></a>
        <Inertia-Link href="" class="font-size-20 text-primary"><i class="mdi mdi-reload" title="Reload Page"></i></Inertia-Link>
        <Inertia-Link :href="route('logout')" method="post" as="button" class="font-size-20 a-button text-primary"><i class="mdi mdi-power" title="Logout"></i></Inertia-Link>
    </div>
</template>
