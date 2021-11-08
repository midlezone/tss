var ef = jQuery;
ef.noConflict();

function ColorLuminance(hex, lum) {

	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;

	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}

	return rgb;
}

ef(window).load(function() {

	var main_col = ef.cookie('fidelityColor'),
		trans = ef.cookie('fidelityTrans');

	if (main_col !== null) {
		ef('body').find('div[id*="ascrail20"]').children('div').css({
			backgroundColor: main_col
		});
	}

	if (trans !== null) {
		ef('.transition').removeClass('btn-primary').addClass('btn-default');
		if (trans === 'fade') {
			ef('.ef-fade').removeClass('btn-default').addClass('btn-primary');
		} else {
			ef('.transition').not('.ef-fade').removeClass('btn-default').addClass('btn-primary');
		}
	}

	ef('.demo-open-close').click(function() {
		if (ef(this).parent().css('right') == '-202px') {
			ef(this).parent().animate({
				"right": "0"
			}, 300);
		} else {
			ef(this).parent().animate({
				"right": "-202px"
			}, 300);
		}
	});

	ef('.demo-color').iris({
		color: main_col !== null ? main_col : '#f1b669',
		palettes: ['#f1b669', '#7ec54e', '#4ec580', '#4eadc5', '#8e77db', '#df70c4', '#f35656'],
		hide: false,
		border: false,
		target: false,
		width: 160
	});

	ef('.transition').click(function() {
		ef('.transition').removeClass('btn-primary').addClass('btn-default');
		ef(this).removeClass('btn-default').addClass('btn-primary');

		trans = ef(this).hasClass('ef-fade') ? 'fade' : 'slide';
		
		return false;
	});

	ef('#apply-styles').click(function() {
		main_col = ef('.demo-color').val();

		ef.cookie('fidelityColor', main_col, {
			expires: 365,
			path: '../../default.htm'
		});
		ef.cookie('fidelityColor1', ColorLuminance(main_col, '-0.15'), {
			expires: 365,
			path: '../../default.htm'
		});
		ef.cookie('fidelityTrans', trans, {
			expires: 365,
			path: '../../default.htm'
		});

		window.location.reload();
		return false;
	});

	ef('#reset-styles').click(function() {

		ef.cookie('fidelityColor', 0, {
			expires: -1,
			path: '../../default.htm'
		});
		ef.cookie('fidelityColor1', 0, {
			expires: -1,
			path: '../../default.htm'
		});
		ef.cookie('fidelityTrans', 0, {
			expires: -1,
			path: '../../default.htm'
		});

		window.location.reload();
		return false;
	});
});