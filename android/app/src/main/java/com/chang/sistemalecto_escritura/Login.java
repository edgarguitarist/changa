package com.chang.sistemalecto_escritura;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.TextUtils;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.JsonRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Login extends AppCompatActivity implements Response.ErrorListener, Response.Listener<JSONObject> {

    private EditText mEmailField,mPasswordField;
    private ProgressDialog progressDialog;

    RequestQueue rq;
    JsonRequest<JSONObject> jrq;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        mEmailField = findViewById(R.id.et_correo);
        mPasswordField = findViewById(R.id.et_contrasena);
        Button iniciar_sesion = findViewById(R.id.ir_login);
        Button r_olvidar = findViewById(R.id.r_olvidar);
        Button saltar = findViewById(R.id.skip);
        progressDialog = new ProgressDialog(this);

        rq = Volley.newRequestQueue(this);

        iniciar_sesion.setOnClickListener(view -> {
            final String email = mEmailField.getText().toString().trim();
            String password = mPasswordField.getText().toString().trim();
            LoginUsuario(email, password);
        });
        /// !Important Borrar luego de Agregar la base de datos
        saltar.setOnClickListener(view -> startActivity(new Intent(Login.this, MenuActivity.class)));

        r_olvidar.setOnClickListener(view -> startActivity(new Intent(Login.this, recovery.class)));
        SharedPreferences preferences = getSharedPreferences("datos", Context.MODE_PRIVATE);
        mEmailField.setText(preferences.getString("pcorreo",""));
    }

    public static boolean isEmailValid(String email) {
        boolean isValid = false;

        String expression = "^[\\w.-]+@([\\w\\-]+\\.)+[A-Z]{2,4}$";

        Pattern pattern = Pattern.compile(expression, Pattern.CASE_INSENSITIVE);
        Matcher matcher = pattern.matcher(email);
        if (matcher.matches()) {
            isValid = true;
        }
        return isValid;
    }

    private void LoginUsuario(String email, String password){
        if(TextUtils.isEmpty(email)){
            Toast.makeText(this, "Por favor Ingrese su Correo", Toast.LENGTH_SHORT).show();
            return;
        }

        if(!isEmailValid(email)){
            Toast.makeText(this, "El Correo Ingresado no es Valido", Toast.LENGTH_SHORT).show();
            return;
        }

        if(TextUtils.isEmpty(password)){
            Toast.makeText(this, "Por favor Ingrese su Contraseña", Toast.LENGTH_SHORT).show();
            return;
        }

        progressDialog.setMessage("Obteniendo sus datos...");
        progressDialog.show();

        String url = conexion.URL_WEB_SERVICES + "sesion.php?Correo=" + email + "&Contrasena=" + password;
        jrq = new JsonObjectRequest(Request.Method.GET, url, null, this, this);
        rq.add(jrq);
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        progressDialog.dismiss();
        Toast.makeText(Login.this, "El Correo o la Contraseña no es correcta.", Toast.LENGTH_SHORT).show();
    }

    @SuppressLint("ApplySharedPref")
    @Override
    public void onResponse(JSONObject response) {
        User usuario = new User();
        JSONArray jsonArray = response.optJSONArray("datos");
        JSONObject jsonObjectson;

        try {
            if (jsonArray != null) {
                jsonObjectson = jsonArray.getJSONObject(0);
                usuario.setId_user(jsonObjectson.optString("id"));
                usuario.setCorreo(jsonObjectson.optString("email"));
                usuario.setContrasena(jsonObjectson.optString("contrasena"));
                usuario.setNombre(jsonObjectson.optString("firstname"));
                usuario.setApellido(jsonObjectson.optString("lastname"));
                usuario.setUsername(jsonObjectson.optString("username"));
                usuario.setIdnumber(jsonObjectson.optString("idnumber"));
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }

        progressDialog.dismiss();

        Intent intencion = new Intent(Login.this, MenuActivity.class);
        SharedPreferences preferences = getSharedPreferences("datos", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = preferences.edit();
        editor.putString("id",usuario.getId_user());
        editor.putString("nombre",usuario.getNombre());
        editor.putString("apellido",usuario.getApellido());
        editor.putString("correo",usuario.getCorreo());
        editor.putString("contrasena", usuario.getContrasena());
        editor.putString("username",usuario.getUsername());
        editor.commit();
        startActivity(intencion);
        finish();
    }

    @Override
    public void onStart() {
        super.onStart();
        SharedPreferences preferences = getSharedPreferences("datos", Context.MODE_PRIVATE);
        String email = preferences.getString("correo","");
        String password = preferences.getString("contrasena","");
        rq = Volley.newRequestQueue(this);
        if (email.isEmpty()){
            LoginUsuario(email, password);
        }
    }

}