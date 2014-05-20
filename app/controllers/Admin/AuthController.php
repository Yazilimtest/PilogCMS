<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 15:59
 */

namespace App\Controllers\Admin;

use BaseController, Redirect, Sentry, View, Input, Mail, Validator;
use Illuminate\Support\Facades\Cache;

class AuthController extends BaseController {

    /**
     * Display the login page
     * @return View
     */
    public function getLogin() {

        if (!Sentry::check()) return View::make('backend/auth/login');
        else return Redirect::route('admin.dashboard');
    }

    /**
     * Login action
     * @return Redirect
     */
    public function postLogin() {
         //yönetici giriş bilgileri tutma
        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        $rememberMe = Input::get('rememberMe');

        try {
         //beni hatırla
            if (!empty($rememberMe)) {
                $user = Sentry::authenticate($credentials, true);
            } else {
                $user = Sentry::authenticate($credentials, false);
            }

            if ($user) {

                Cache::flush();

                return Redirect::route('admin.dashboard');
            }
        } catch (\Exception $e) {
            return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    /**
     * Logout action
     * @return Redirect
     */
    public function getLogout() {
        //yönetici çıkışı
        Sentry::logout();

        return Redirect::route('admin.login');
    }

    public function getForgotPassword() {

        if (!Sentry::check()) return View::make('backend/auth/forgot-password');
        else return Redirect::route('admin.dashboard');
    }

    public function postForgotPassword() {
         //parola hatırlama email kullanarak
        $credentials = array(
            'email' => Input::get('email')
        );

        $rules = array(
            'email' => 'required|email',
        );

        $validation = Validator::make($credentials, $rules);

        if ($validation->fails()) {

            return Redirect::back()->withErrors($validation)->withInput();
        }

        try {

            // Yöneticinin mail adresini bul
            $user = Sentry::findUserByLogin($credentials['email']);

            // Şifre sıfırlama kodu oluştur
            $resetCode = $user->getResetPasswordCode();

            $formData = array('userId' => $user->id, 'resetCode' => $resetCode);

            Mail::send('emails.auth.reset-password', $formData, function ($message) {

                $message->from('noreply@PilogCMS.com', 'Pilog  Team');
                $message->to('info@Pilog.com', 'Pilog CMS')->subject('Reset Password');
            });
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
        catch (\Exception $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
    }

    public function getResetPassword($id, $code) {

        // Kullanıcı id değerini bul
        $user = Sentry::findUserById($id);

        // Şifre sıfırlama kodu geçerli mi?
        if (!$user->checkResetPasswordCode($code)) {
            return Redirect::route('admin.login');
        }

        return View::make('backend/auth/reset-password', compact('id', 'code'));
    }

    public function postResetPassword() {

        $formData = array(
            'id'               => Input::get('id'),
            'code'             => Input::get('code'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password')
        );

        $rules = array(
            'id'               => 'required',
            'code'             => 'required',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {

            return Redirect::back()->withErrors($validation)->withInput();
        }

        try {
            // Kullanıcı id değerini bul
            $user = Sentry::findUserById($formData['id']);

            // Şifre sıfırlama kodu geçerli mi?
            if ($user->checkResetPasswordCode($formData['code'])) {
                // Sıfırlama şifresini yolla
                if ($user->attemptResetPassword($formData['code'], $formData['password'])) {
                    // Şifre sıfırlandı
                    return Redirect::route('admin.login');
                } else {
                    // Şifre sıfırlama başarısız
                    return Redirect::action('App\Controllers\Admin\AuthController@getResetPassword')->withErrors(array('forgot-password' => 'Password reset failed'));
                }
            } else {
                // The provided password reset code is Invalid
                return Redirect::action('App\Controllers\Admin\AuthController@getResetPassword')->withErrors(array('forgot-password' => 'The provided password reset code is Invalid'));
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {

            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
    }
}