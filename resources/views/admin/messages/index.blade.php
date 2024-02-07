@extends('admin.layout.index', ['pageActive' => 'admin.messages', 'pageTitle' => 'Messages']);

@section('styles')
<style>
#previewChat {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 14rem;
}
</style>
@endsection

@section('content')
    {{-- Message --}}
    <div class="flex justify-center content-center">
        <div class="card card-compact w-full bg-slate-600 shadow-xl rounded-md md:max-w-max">
            <div class="card-body">
                {{-- Title --}}
                <div class="flex justify-between items-center">
                    <h2 class="card-title text-white">List of Teams</h2>
                    <div class="badge text-white font-medium" id="activeNum">7</div>
                </div>
                <div class="divider my-0"></div>

                {{-- Search --}}
                <div class="join">
                    <form class="grid grid-cols-5">
                        <input type="text" placeholder="Search..." class="col-span-4 input input-bordered w-full rounded-sm" />
                        <button class="col-span-1 btn rounded-sm">Search</button>
                    </form>
                </div>

                {{-- Messages --}}
                <div class="flex flex-col gap-4 max-h-96 overflow-y-scroll select-none">
                    {{-- List of Messages Here --}}
                    <a href="#" class="message flex p-2 gap-x-3 rounded-md hover:bg-slate-800 hover:bg-opacity-25 hover:cursor-pointer">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="rounded-full w-14">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        {{-- Nama Tim --}}
                        <div>
                            <p class="text-white font-medium text-md">Tim Nathan</p>
                            <p id="previewChat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, obcaecati. Vel neque delectus non nam eum iusto alias nisi eius similique labore, perspiciatis nostrum deleniti animi sapiente, exercitationem odio veniam.</p>
                        </div>
                    </a>

                    <div class="message flex p-2 gap-x-3 rounded-md hover:bg-slate-800 hover:bg-opacity-25 hover:cursor-pointer">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="rounded-full w-14">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        {{-- Nama Tim --}}
                        <div>
                            <p class="text-white font-medium text-md">Tim Barudak Nawi</p>
                            <p id="previewChat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, obcaecati. Vel neque delectus non nam eum iusto alias nisi eius similique labore, perspiciatis nostrum deleniti animi sapiente, exercitationem odio veniam.</p>
                        </div>
                    </div>

                    <div class="message flex p-2 gap-x-3 rounded-md hover:bg-slate-800 hover:bg-opacity-25 hover:cursor-pointer">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="rounded-full w-14">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        {{-- Nama Tim --}}
                        <div>
                            <p class="text-white font-medium text-md">Tim Barudak Nawi</p>
                            <p id="previewChat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, obcaecati. Vel neque delectus non nam eum iusto alias nisi eius similique labore, perspiciatis nostrum deleniti animi sapiente, exercitationem odio veniam.</p>
                        </div>
                    </div>

                    <div class="message flex p-2 gap-x-3 rounded-md hover:bg-slate-800 hover:bg-opacity-25 hover:cursor-pointer">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="rounded-full w-14">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        {{-- Nama Tim --}}
                        <div>
                            <p class="text-white font-medium text-md">Tim Barudak Nawi</p>
                            <p id="previewChat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, obcaecati. Vel neque delectus non nam eum iusto alias nisi eius similique labore, perspiciatis nostrum deleniti animi sapiente, exercitationem odio veniam.</p>
                        </div>
                    </div>

                    <div class="message flex p-2 gap-x-3 rounded-md hover:bg-slate-800 hover:bg-opacity-25 hover:cursor-pointer">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="rounded-full w-14">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        {{-- Nama Tim --}}
                        <div>
                            <p class="text-white font-medium text-md">Tim Barudak Nawi</p>
                            <p id="previewChat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, obcaecati. Vel neque delectus non nam eum iusto alias nisi eius similique labore, perspiciatis nostrum deleniti animi sapiente, exercitationem odio veniam.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection()