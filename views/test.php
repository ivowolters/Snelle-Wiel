package com.example.ivo.skimap;

import android.Manifest;
import android.app.Fragment;
import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.content.Context;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationManager;
import android.os.Build;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.os.SystemClock;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.Chronometer;

import com.google.android.gms.maps.MapFragment;

public class MainActivity extends AppCompatActivity
implements NavigationView.OnNavigationItemSelectedListener {

public double _latitude;
public double _longitude;

protected String _provider;
protected LocationManager _locManager;
protected Criteria _cri;
protected Location _location;
protected CountDownTimer _tmCheckData;
protected Button _btRecord;
private Chronometer _crTimetskied;

@Override
protected void onCreate(Bundle savedInstanceState) {
super.onCreate(savedInstanceState);
setContentView(R.layout.activity_main);
Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
setSupportActionBar(toolbar);

DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
drawer.setDrawerListener(toggle);
toggle.syncState();

NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
navigationView.setNavigationItemSelectedListener(this);


GpsPermission();
_locManager = (LocationManager) this.getSystemService(Context.LOCATION_SERVICE);


// Attention: chronometer ophalen

_crTimetskied = (Chronometer) findViewById(R.id.swTimeExact);
/*
_crTimetskied.setOnChronometerTickListener(new Chronometer.OnChronometerTickListener() {
@Override
public void onChronometerTick(Chronometer chronometer) {
int cTextSize = _crTimetskied.getText().length();
if (cTextSize == 5) {
chronometer.setText("00:" + _crTimetskied.getText().toString());
} else if (cTextSize == 7) {
chronometer.setText("0" + _crTimetskied.getText().toString());
}
}
});
*/
}

@Override
public void onBackPressed() {
DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
if (drawer.isDrawerOpen(GravityCompat.START)) {
drawer.closeDrawer(GravityCompat.START);
} else {
super.onBackPressed();
}
}

@Override
public boolean onCreateOptionsMenu(Menu menu) {
// Inflate the menu; this adds items to the action bar if it is present.
getMenuInflater().inflate(R.menu.main, menu);
return true;
}

@Override
public boolean onOptionsItemSelected(MenuItem item) {
// Handle action bar item clicks here. The action bar will
// automatically handle clicks on the Home/Up button, so long
// as you specify a parent activity in AndroidManifest.xml.
int id = item.getItemId();

//noinspection SimplifiableIfStatement
if (id == R.id.action_settings) {
return true;
}

return super.onOptionsItemSelected(item);
}

@SuppressWarnings("StatementWithEmptyBody")
@Override
public boolean onNavigationItemSelected(MenuItem item) {
// Handle navigation view item clicks here.
int id = item.getItemId();

if (id == R.id.nav_info) {
Info_Fragment fragment = new Info_Fragment();
OpenFragment(fragment);
} else if (id == R.id.nav_map) {
MapFragment fragment = new MapFragment();
OpenFragment(fragment);
} else if (id == R.id.nav_settings) {

}

DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
drawer.closeDrawer(GravityCompat.START);
return true;
}

public void GpsPermission() {
if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
requestPermissions(new String[]{
Manifest.permission.ACCESS_FINE_LOCATION,
Manifest.permission.ACCESS_COARSE_LOCATION,
Manifest.permission.INTERNET
}, 10);
}
}

public void OpenFragment(Fragment f){
android.app.FragmentTransaction transaction = getFragmentManager().beginTransaction();
transaction.add(R.id.content_main, f); // fragment container id in first parameter is the  container(Main layout id) of Activity
transaction.addToBackStack(null);  // this will manage backstack
transaction.commit();
}

public void startTimer(){

if(_btRecord.getText().toString() == "Rec" ) {
_crTimetskied.setBase(SystemClock.elapsedRealtime());
_btRecord.setText("Pause");
_crTimetskied.start();
}
else if (_btRecord.getText().toString() == "Resume"){
_crTimetskied.start();
_btRecord.setText("Pause");
}
else if(_btRecord.getText().toString() == "Pause") {
_crTimetskied.stop();
_btRecord.setText("Resume");
}
}
}
