<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استعلام حجم نیک گیم</title>
    <link rel="stylesheet" href="style/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
@livewireStyles

<body dir="rtl" class="bg-[#F2F3F3]">
    {{ $slot }}
</body>
@livewireScripts
<script>
  function toggleScrollerClass() {
    const scroller = document.getElementById('scroller');
    if (scroller) {
      scroller.classList.toggle('back');
      scroller.classList.toggle('flex');
      scroller.classList.toggle('w-[644px]');
    }
  }
</script>

</html>