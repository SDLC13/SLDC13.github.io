<form id="formStudentLogin" onsubmit="handlePortalLogin(event)" class="space-y-4">

    <!-- STUDENT NAME -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Student Name:
        </label>

        <div class="relative flex items-center validation-group">
            
            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-user absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="text"
                id="loginStudentName"
                required
                placeholder="SURNAME, FIRST NAME MIDDLENAME"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm font-bold text-amber-100 uppercase outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- STUDENT ID -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Student Account Number:
        </label>

        <div class="relative flex items-center validation-group">

            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-id-badge absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="text"
                id="loginStudentId"
                required
                placeholder="e.g. 2024-10143-MN-0"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm font-semibold text-amber-100 outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- COURSE -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Course / Section:
        </label>

        <div class="relative flex items-center validation-group">

            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-graduation-cap absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="text"
                id="loginStudentCourse"
                required
                placeholder="e.g. CEIT-03-401A"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm font-medium text-amber-200/90 outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- PASSWORD -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Password:
        </label>

        <div class="relative flex items-center validation-group">

            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-lock absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="password"
                id="loginStudentPassword"
                required
                placeholder="•••••••••••••"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm text-amber-100 outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- BUTTON -->
    <button
        type="submit"
        class="w-full bg-gradient-to-r from-amber-300 via-amber-500 to-amber-600 text-indigo-950 font-black py-3 px-4 rounded-lg text-xs uppercase tracking-widest shadow-lg transition transform active:scale-98 cursor-pointer"
    >
        Verify Student Identity
    </button>

</form>



<form id="formAdminLogin" onsubmit="handleAdminVerification(event)" class="space-y-4 hidden">

    <!-- ADMIN EMAIL -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Personnel Email:
        </label>

        <div class="relative flex items-center validation-group">

            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-user-shield absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="text"
                id="loginAdminId"
                required
                placeholder="admin@rtu.edu.ph"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm font-semibold text-amber-100 outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- ADMIN PASSWORD -->
    <div>
        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">
            Authorization Password Passkey:
        </label>

        <div class="relative flex items-center validation-group">

            <!-- STATUS CIRCLE -->
            <span class="status-indicator status-red"></span>

            <!-- ICON -->
            <i class="fa-solid fa-key absolute left-3 text-amber-400/60 text-sm"></i>

            <!-- INPUT -->
            <input
                type="password"
                id="loginAdminPin"
                required
                placeholder="•••••••••••••"
                class="login-input w-full pl-9 pr-3 py-2.5 bg-[#0a152b] border border-amber-500/30 rounded-lg text-sm text-amber-100 outline-none focus:border-amber-400 transition"
            >
        </div>
    </div>

    <!-- BUTTON -->
    <button
        type="submit"
        class="w-full bg-gradient-to-r from-amber-400 to-amber-600 text-indigo-950 font-black py-3 px-4 rounded-lg text-xs uppercase tracking-widest shadow-lg transition transform active:scale-98 cursor-pointer"
    >
        Authenticate Admin Node
    </button>

</form>