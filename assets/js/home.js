window.addEventListener("touchmove",showItem);
window.addEventListener("scroll",showItem2);

function showItem(){
	let visi = document.getElementById('visi');
	let visiPos = visi.getBoundingClientRect();
	let misi = document.getElementById('misi');
	let misiPos = misi.getBoundingClientRect();
	let history = document.getElementById('history');
	let historyPos = history.getBoundingClientRect();
	let triger = document.getElementById('triger');

	if (visiPos.y <= 0) {
		triger.classList.add("active")
	} else {
		triger.classList.remove("active")
	}
	if (visiPos.y <= 300) {
		visi.classList.add("active")
	} else {
		visi.classList.remove("active")
	}

	if (misiPos.y <= 400) {
		misi.classList.add("active")
	} else {
		misi.classList.remove("active")
	}

	if (historyPos.y <= 500 ) {
		history.classList.add("active")
	} else {
		history.classList.remove("active")
	}
}

function showItem2(){
	let visi = document.getElementById('visi');
	let visiPos = visi.getBoundingClientRect();
	let misi = document.getElementById('misi');
	let misiPos = misi.getBoundingClientRect();
	let history = document.getElementById('history');
	let historyPos = history.getBoundingClientRect();
	let triger = document.getElementById('triger');
	let nav = document.getElementsByTagName('nav')[0];

	if (visiPos.y <= 0) {
		triger.classList.add("active");
		nav.classList.add("active");
	} else {
		triger.classList.remove("active")
		nav.classList.remove("active");
	}
	if (visiPos.y <= 300) {
		visi.classList.add("active")
	} else {
		visi.classList.remove("active")
	}

	if (misiPos.y <= 400) {
		misi.classList.add("active")
	} else {
		misi.classList.remove("active")
	}

	if (historyPos.y <= 450 ) {
		history.classList.add("active")
	} else {
		history.classList.remove("active")
	}
}



function showNavbar() {
	let nav = document.getElementById('navbar');
	let sidebar = nav.getAttribute("class");
	let wrapper = document.getElementsByClassName('wrapper')[0];
	let navbarIcon = document.getElementsByClassName('navbar-icon')[0];
	if (sidebar == null || sidebar == '' ) {
		nav.classList.add("expand");
		wrapper.classList.add("overlay");
		navbarIcon.style.display = 'none';
	} else {
		nav.classList.remove("expand");
		wrapper.classList.remove("overlay");
		navbarIcon.style.display = 'block';
	}
	window.addEventListener("touchstart",function(){
		if (event.target !== nav) {
			nav.classList.remove("expand");
			wrapper.classList.remove("overlay");
			navbarIcon.style.display = 'block';
		}
	});
}

const productItem = document.getElementsByClassName('product-item');
const productShowCase = document.getElementsByClassName('product-showcase');
const navButton = document.getElementsByClassName('nav-item')

for (var i = 0 ; i < productItem.length; i++) {
	productItem[i].addEventListener('click',showProductPic,false)
}
for (var i = 0 ; i < navButton.length; i++) {
	navButton[i].addEventListener('click',smoothScroll)
}

function showProductPic() {
	for (var i = 0 ; i < productShowCase.length; i++) {
		productShowCase[i].classList.remove("active")
	}
	let productId = this.getAttribute('data-product')
	document.getElementById(productId).classList.add("active");
}


function currentYPosition() {
    // Firefox, Chrome, Opera, Safari
    if (self.pageYOffset) return self.pageYOffset;
    // Internet Explorer 6 - standards mode
    if (document.documentElement && document.documentElement.scrollTop)
        return document.documentElement.scrollTop;
    // Internet Explorer 6, 7 and 8
    if (document.body.scrollTop) return document.body.scrollTop;
    return 0;
}


function elmYPosition(eID) {
    var elm = document.getElementById(eID);
    var y = elm.offsetTop;
    var node = elm;
    while (node.offsetParent && node.offsetParent != document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    } return y;
}


function smoothScroll() {
    var startY = currentYPosition();
    var stopY = elmYPosition(this.getAttribute('data-target'));
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    if (distance < 100) {
        scrollTo(0, stopY); return;
    }
    var speed = Math.round(distance / 100);
    if (speed >= 20) speed = 20;
    var step = Math.round(distance / 25);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    if (stopY > startY) {
        for ( var i=startY; i<stopY; i+=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; if (leapY > stopY) leapY = stopY; timer++;
        } return;
    }
    for ( var i=startY; i>stopY; i-=step ) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
    }
}