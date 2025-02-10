<x-authTemplate>
    <div class="h-screen w-full flex justify-center items-center">
        <div class="bg-white shadow-lg border-1 border-slate-400 rounded-lg">
            <form action="/login" method="POST" class="w-full flex flex-col justify-center items-center px-9 py-14 gap-7">
                @csrf
                <h1 class="text-4xl font-bold uppercase p-4 mb-8 text-blueSide">Login</h1>

                <!-- Username or Email Input -->
                <div class="flex items-center rounded-md border-2 border-slate-400 px-3 py-2 justify-between group focus-within:border-blueSide transition-all ease-in-out duration-200">
                    <input type="text" id="username" name="username" class="focus:outline-none focus:ring-0 focus:border-transparent w-[30rem]" placeholder="Username atau Email...">
                    <i class="fi fi-ss-portrait text-3xl text-slate-500 group-focus-within:text-blueSide transition-all ease-in-out duration-200 -mb-1"></i>
                </div>

                <!-- Password Input -->
                <div class="flex items-center justify-between rounded-md border-2 border-slate-400 px-3 py-2 group focus-within:border-blueSide transition-all ease-in-out duration-200">
                    <input type="password" id="password" name="password" class="focus:outline-none focus:ring-0 focus:border-transparent w-[30rem]" placeholder="Password...">
                    <i class="fi fi-ss-key text-3xl text-slate-500 group-focus-within:text-blueSide transition-all ease-in-out duration-200 -mb-1"></i>
                </div>

                <!-- Condition (WFO, WFH, LAP) -->
                <select name="condition" id="condition" class="group w-full px-3 py-2 border-2 border-slate-400 rounded-md appearance-none focus:border-blueSide transition-all ease-in-out duration-200">
                    <option value="WFO">PKL Dari Kantor</option>
                    <option value="WFH">PKL Dari Rumah</option>
                    <option value="LAP">PKL di Lapangan</option>
                </select>

                <!-- Login Button -->
                <div class="w-full flex justify-end mt-8">
                    <button type="submit" class="bg-blueish px-7 py-3 text-white text-lg font-semibold rounded-lg">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-authTemplate>
