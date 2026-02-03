<x-layout title="Contato - {{ config('app.name', 'Laravel') }}">
    <section class="pluma-section">
        <div class="pluma-container">
            <div class="mx-auto max-w-4xl">
                <!-- Header -->
                <div class="text-center mb-12">
                    <div class="animate-fade-in-up inline-flex items-center gap-2 rounded-full border border-gray-200 bg-[rgb(var(--secondary))] px-4 py-2 mb-4">
                        <span class="grid size-7 place-items-center rounded-full bg-white">
                            <svg class="size-4 text-[rgb(var(--accent))]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <span class="text-sm text-gray-500">
                            Fale Conosco
                        </span>
                    </div>

                    <h1 class="animate-fade-in-up animate-delay-100 text-[clamp(2rem,4vw,3rem)] font-bold leading-[1.1] tracking-[-0.02em] text-[rgb(var(--primary))]">
                        Entre em Contato
                    </h1>

                    <p class="animate-fade-in-up animate-delay-200 mt-4 text-lg text-gray-500">
                        Preencha o formulário abaixo e retornaremos em breve
                    </p>
                </div>

                <!-- Form -->
                <div class="animate-fade-in-up animate-delay-300 relative">
                    <div class="absolute -inset-6 rounded-[28px] bg-[radial-gradient(circle_at_20%_10%,rgba(190,173,128,0.08),transparent_45%),radial-gradient(circle_at_90%_40%,rgba(190,173,128,0.06),transparent_55%)]"></div>

                    <div class="relative overflow-hidden rounded-[28px] border border-[rgb(var(--card-border))] bg-white p-8 md:p-12 pluma-noise">
                        <form id="contact-form" class="space-y-6">
                            @csrf

                            <!-- Nome e Email -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                        Nome Completo <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        required
                                        class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20"
                                        placeholder="João Silva"
                                    />
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                        E-mail <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        required
                                        class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20"
                                        placeholder="joao@exemplo.com"
                                    />
                                </div>
                            </div>

                            <!-- Empresa e Telefone -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="company" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                        Empresa
                                    </label>
                                    <input
                                        type="text"
                                        id="company"
                                        name="company"
                                        class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20"
                                        placeholder="Minha Empresa Ltda"
                                    />
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                        Telefone
                                    </label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20"
                                        placeholder="(11) 99999-9999"
                                    />
                                </div>
                            </div>

                            <!-- Assunto -->
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                    Assunto <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    required
                                    class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20"
                                    placeholder="Como podemos ajudar?"
                                />
                            </div>

                            <!-- Mensagem -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-[rgb(var(--primary))] mb-2">
                                    Mensagem <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="message"
                                    name="message"
                                    required
                                    rows="6"
                                    class="w-full rounded-lg border-2 border-[rgb(var(--card-border))] bg-white px-4 py-3 text-[rgb(var(--primary))] placeholder-gray-400 transition-all duration-200 focus:border-[rgb(var(--accent))] focus:outline-none focus:ring-2 focus:ring-[rgb(var(--accent))]/20 resize-none"
                                    placeholder="Descreva sua mensagem aqui..."
                                ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-between pt-4">
                                <p class="text-sm text-gray-500">
                                    <span class="text-red-500">*</span> Campos obrigatórios
                                </p>

                                <button
                                    type="submit"
                                    class="group flex items-center gap-2 rounded-lg bg-[rgb(var(--accent))] px-8 py-4 font-semibold text-white shadow-[var(--shadow-colored)] transition-all duration-200 hover:-translate-y-[2px] hover:bg-[rgb(var(--primary-dark))] hover:shadow-[var(--shadow-medium)]"
                                >
                                    Enviar Mensagem
                                    <svg class="size-5 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <!-- Success Message (hidden by default) -->
                        <div id="success-message" class="hidden rounded-lg border-2 border-green-200 bg-green-50 p-4 text-green-800">
                            <div class="flex items-center gap-3">
                                <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold">Mensagem enviada com sucesso!</h3>
                                    <p class="text-sm">Retornaremos em breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot:scripts>
        <script>
            // Basic form validation
            document.getElementById('contact-form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    company: document.getElementById('company').value,
                    phone: document.getElementById('phone').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message').value,
                };

                // Basic validation
                if (!formData.name || !formData.email || !formData.subject || !formData.message) {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                    return;
                }

                // Email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(formData.email)) {
                    alert('Por favor, insira um e-mail válido.');
                    return;
                }

                console.log('Form Data:', formData);

                // TODO: Send form data to backend
                // For now, just show success message
                document.getElementById('contact-form').classList.add('hidden');
                document.getElementById('success-message').classList.remove('hidden');
            });
        </script>
    </x-slot:scripts>
</x-layout>
