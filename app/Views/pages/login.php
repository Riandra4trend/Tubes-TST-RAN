<div class ="flex h-screen w-full bg-gradient-to-l from-cyan-100 via-slate-400 to-sky-100 overflow-hidden relative">
    <image src="/background.svg" class= "bg-cover absolute"></image>
    <div class="flex justify-center m-auto">
        <div class="pt-[113px] pb-[124px] px-[120px] bg-white bg-opacity-30 rounded-xl backdrop-blur">
            <h1 class="text-black text-2xl font-bold">Your Logo</h1>
            <h1 class="mt-[9px] text-stone-800 text-[38px] font-bold">Login</h1>
            <form action="/login_action" method="POST">
                <p class="mt-[26px] text-black text-sm font-normal">Email</p>
                <div class="mt-2 bg-white rounded-lg">
                    <input type="email" name="email" placeholder="Enter your email" class="text-black pt-[15.57px] pb-[16.44px] pl-[22px] pr-[300px] rounded-lg">
                </div>
                <p class="mt-[30.56px] text-black text-sm font-normal">Password</p>
                <div class="flex flex-row items-center mt-2 bg-white rounded-lg border-black">
                    <input type="password" name="password" class="text-black rounded-lg pt-[15.57px] pb-[16.44px] pl-[22px] pr-[300px]" placeholder="Enter your password">
                    <!-- Eye icon for password visibility -->
                    <span class="text-[#737373] text-xl cursor-pointer ml-[470px] absolute">
                        <!-- Add your eye icon image or use an inline SVG here -->
                    </span>
                </div>
                <p class="mt-[15.91px] text-stone-800 text-xs font-normal">Forgot Password?</p>
                <button class="block w-full mt-[39.72px] pt-[11.28px] pb-[12.72px] px-[28px] text-center bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white text-xl font-bold" type="submit">
                    Sign in
                </button>
            </form>
            <p class="mt-[45.28px] text-center text-stone-800 text-sm font-normal">
                Don't have an account yet?
                <span class="text-stone-800 text-sm font-semibold cursor-pointer">
                    Register Here
                </span>
            </p>
        </div>
    </div>
</div>
