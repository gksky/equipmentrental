<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<link rel="stylesheet" href="https://арендаспецтехники.бел/slider.css">
<?php
$files = scandir($path);
for ($i = 0; $i < count($files); $i++) {
	if (strripos($files[$i], "jpg") || strripos($files[$i], "png")) {
		$img[] = $files[$i];
		echo $img[$i];
	}
	if (strripos($files[$i], "pdf")) {
		$pdf[] = $files[$i];
	}
}
?>
<div class="slider" style="" id="app-slider">
	<div class="prev" style="" v-on:click="prevImage"></div>
	<img class="slide" style="" :src="image[i]" alt="<?php echo $row["typegroup"]." ".$row["manu"]." ".$row["model"]; ?>"/>
    <div class="next" style="" v-on:click="nextImage"></div>
    <div class="nav-dots" style="">
		<?php
		for ($i = 0; $i < count($img); $i++) {
			echo "<div :class='dotclass[".$i."]' v-on:click='changeImage(".$i.")'></div>";
		}
		?>
	</div>
</div>

<script>
	var slider = new Vue({
	    el: '#app-slider',
        data: {
            image: [<?php for ($i = 0; $i < count($img)-1; $i++) { echo "'../../".$path.$img[$i]."', "; } echo "'../../".$path.$img[$i]."'"; ?>],
            dotclass: ['nav-dot active', <?php for ($i = 1; $i < count($img)-1; $i++) { echo "'nav-dot', "; } echo "'nav-dot'"; ?>],
            i: 0,
        },
        methods: {
            prevImage: function () {
                if (this.i > 0) {
                    this.dotclass[this.i] = "nav-dot";
                    this.i--;
                    this.dotclass[this.i] = "nav-dot active";
                }
                else {
                    this.dotclass[this.i] = "nav-dot";
                    this.i = this.image.length - 1;
                    this.dotclass[this.i] = "nav-dot active";
                }
            },
            nextImage: function () {
                if (this.i < this.image.length - 1) {
                    this.dotclass[this.i] = "nav-dot";
                    this.i++;
                    this.dotclass[this.i] = "nav-dot active";
                }
                else {
                    this.dotclass[this.i] = "nav-dot";
                    this.i = 0;
                    this.dotclass[this.i] = "nav-dot active";
                }
            },
            changeImage: function (n) {
                this.dotclass[this.i] = "nav-dot";
                this.i = n;
                this.dotclass[this.i] = "nav-dot active";
            }
        }
    });
</script>