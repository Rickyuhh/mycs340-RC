let shape_type = null;
let len = 0;
let width = 0;
let height = 0;
let peri = 0;
let s_area = 0;
let vol = 0;
let radius = 0;
let circumference = 0;
const PIE = Math.PI;
let sphere_area = 0;
let sphere_volume = 0;
function getType() {
    let selected_shape = document.getElementById("shape_selected");
    shape_type = selected_shape.options[selected_shape.selectedIndex].value;
    setTypeParameter();
}
function setTypeParameter() {
    clearScreen();
    if(shape_type==='Select a Shape'){
        document.getElementById('message').innerHTML='You need to select a valid shape';
    }
    else if(shape_type==='Square') {
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Rectangle'){
        document.getElementById('lblId_len').innerHTML='Enter the length of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
        document.getElementById('lblId_width').innerHTML='Enter the width of the '+ shape_type;
        document.getElementById('lblId_width').style.display='inline-block';
        document.getElementById('txtId_width').style.display='inline-block';
    }
    else if(shape_type==='Circle'){
        document.getElementById('lblId_len').innerHTML='Enter the radius of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Triangle'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Right Triangle'){
        document.getElementById('lblId_len').innerHTML='Enter the adjacent side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
        document.getElementById('lblId_width').innerHTML='Enter the opposite of the '+ shape_type;
        document.getElementById('lblId_width').style.display='inline-block';
        document.getElementById('txtId_width').style.display='inline-block';
    }
    else if(shape_type==='Parallelogram'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Trapezoid'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Cube'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Prism'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Pyramid or Cone'){
        document.getElementById('lblId_len').innerHTML='Enter the side of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
    else if(shape_type==='Sphere'){
        document.getElementById('lblId_len').innerHTML='Enter the radius of the '+ shape_type;
        document.getElementById('lblId_len').style.display='inline-block';
        document.getElementById('txtId_len').style.display='inline-block';
    }
}
function getTypeParameter() {
    switch (shape_type) {
        case 'Select a shape':
            document.getElementById('message').innerHTML='You need to select a valid shape';
            break;
        case 'Square':
            len = document.getElementById('txtId_len').value*1;
            if(len > 0){
                peri = len * 4;
                s_area = len * len;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Rectangle':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Circle':
            radius = document.getElementById('txtId_len').value*1;
            if(radius > 0){
                circumference = 2 * PIE * radius;
                peri = circumference;
                s_area = PIE * (radius * radius);
                getPerimeter_area()
                document.getElementById('lblId_perimeter').innerHTML='The circumference of the ' + shape_type.toLowerCase() + ': ' + peri.toFixed(0);
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Triangle':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 3 * len;
                s_area = (1/2) * (len * len);
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Right Triangle':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 3 * len;
                s_area = (1/2) * (len * len);
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Parallelogram':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Trapezoid':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Cube':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Prism':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Pyramid or Cone':
            len = document.getElementById('txtId_len').value*1;
            width = document.getElementById('txtId_width').value*1;
            if(len > 0){
                peri = 2 * (len + width);
                s_area = len * width;
                getPerimeter_area();
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
        case 'Sphere':
            radius = document.getElementById('txtId_len').value*1;
            if(radius > 0){
                vol = (4/3) * PIE * (radius * radius * radius);
                peri = vol;
                s_area = 4 * PIE * (radius * radius);
                getVolume_area()
            }
            else {
                document.getElementById('message').innerHTML='You have entered an invalid entry';
                document.getElementById('message').style.display='inline-block';
            }
            break;
    }
    explanation();
}

function clearScreen(){
    document.getElementById('message').innerHTML='';
    document.getElementById('lblId_len').style.display='none';
    document.getElementById('txtId_len').style.display='none';
    document.getElementById('txtId_len').value='';
    document.getElementById('lblId_width').style.display='none';
    document.getElementById('txtId_width').style.display='none';
    document.getElementById('txtId_width').value='';
    document.getElementById('lblId_height').style.display='none';
    document.getElementById('txtId_height').style.display='none';
    document.getElementById('txtId_height').value='';
    document.getElementById('lblId_perimeter').style.display='none';
    document.getElementById('lblId_area').style.display='none';
    document.getElementById('lblId_volume').style.display='none';
    document.getElementById('shape_titleID').style.display = 'none';
    document.getElementById('object_def').style.display = 'none';
    document.getElementById('object_explanation').style.display = 'none';
    document.getElementById('object_explanation1').style.display='none';
    document.getElementById('formulas').style.display='none';
    document.getElementById('area_formula').style.display='none';
    document.getElementById('volume_formula').style.display = 'none';
}

function getPerimeter_area() {
    document.getElementById('lblId_perimeter').innerHTML='The perimeter of the ' + shape_type.toLowerCase() + ': ' + peri.toFixed(0);
    document.getElementById('lblId_perimeter').style.display = 'inline-block';
    document.getElementById('lblId_area').innerHTML='The area of the ' + shape_type.toLowerCase() + ': ' + s_area.toFixed(0);
    document.getElementById('lblId_area').style.display = 'inline-block';
}
function getVolume_area() {
    document.getElementById('lblId_perimeter').innerHTML='The volume of the ' + shape_type.toLowerCase() + ': ' + peri.toFixed(0);
    document.getElementById('lblId_perimeter').style.display = 'inline-block';
    document.getElementById('lblId_area').innerHTML='The area of the ' + shape_type.toLowerCase() + ': ' + s_area.toFixed(0);
    document.getElementById('lblId_area').style.display = 'inline-block';
}

function setup() {
    let xPos = 400;
    let yPos = 300;
    createCanvas(xPos,yPos, WEBGL, geo_canvas);
    detailY = createSlider(2, 24, 6);
    detailY.position(10, height + 5);
    detailY.style('width', '80px');
}
function draw() {
    document.getElementById('geo_canvas').style.display = 'inline-block';
    switch (shape_type) {
        case 'Square':
            if (len <= 10) {
                background(58, 136, 181);
                rectMode(CENTER);
                fill(117, 106, 107);
                stroke(147, 3, 16);
                square(15, 20, len*20);
            }
            else if (len > 10) {
                background(58, 136, 181);
                rectMode(CENTER);
                fill(117, 106, 107);
                stroke(147, 3, 16);
                square(15, 20, 20);
            }
            break;
        case 'Rectangle':
            if (len <= 10) {
                background(58, 136, 181);
                rectMode(CENTER);
                fill(117, 106, 107);
                stroke(147, 3, 16);
                rect(15, 20, 20);
            }
            else if (len > 10) {
                background(58, 136, 181);
                rectMode(CENTER);
                fill(117, 106, 107);
                stroke(147, 3, 16);
                rect(15, 20, 20);
            }
            break;
        case 'Sphere':
            if (radius <= 10) {
                background(58, 136, 181);
                rotateY(millis() / 1000);
                sphere(radius * 10);
                // sphere(radius * 10);
            }
            else if (radius > 10) {
                background(58, 136, 181);
                rotateY(millis() / 1000);
                sphere(radius);
                // sphere(40);
            }
    }
}

function explanation() {
    if(shape_type==='Select a shape')
    {

    }
    else if (shape_type==='Square')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Rectangle')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Circle')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Triangle')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Right Triangle')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Parallelogram')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Trapezoid')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Cube')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Prism or Cylinder')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Pyramid or Cone')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A square is a quadrilateral with four equal sides and four right angles.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('volume_formula').innerHTML = '';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
    else if (shape_type==='Sphere')
    {
        document.getElementById('shape_titleID').innerHTML = shape_type.toLowerCase();
        document.getElementById('shape_titleID').style.display = 'inline-block';
        document.getElementById('object_def').innerHTML = 'Definition';
        document.getElementById('object_def').style.display = 'inline-block';
        document.getElementById('object_explanation').innerHTML = 'A sphere is a geometrical object that is a three-dimensional analogue to a two-dimensional circle. Formally, a sphere is the set of points that are all at the same distance r from a given point in three-dimensional space. That given point is the center of the sphere, and r is the sphere\'s radius.';
        document.getElementById('object_explanation').style.display = 'inline-block';
        document.getElementById('formulas').innerHTML = 'Formulas';
        document.getElementById('area_formula').innerHTML = '';
        document.getElementById('volume_formula').innerHTML = '4';
        document.getElementById('volume_formula').style.display = 'inline-block';
    }
}