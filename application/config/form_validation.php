<?php

$config=[



			'admin_login'=>[
								[
								'field'=>'username',
								'label'=>'Username',
								'rules'=>'required',
								],

								[
								'field'=>'password',
								'label'=>'Password',
								'rules'=>'required',
								],

							],

				'article_rules'=>[	
								[
								'field'=>'title',
								'label'=>'Title',
								'rules'=>'required|min_length[6]|max_length[160]',
								],
								[
								'field'=>'body',
								'label'=>'Body',
								'rules'=>'required|min_length[400]|max_length[25000]',
								]

							],


				'signup-rules'=>[

									[
										'field'=>'uname',
										'label'=>'Username',
										'rules'=>'required',
									],

									[
										'field'=>'fname',
										'label'=>'First Name',
										'rules'=>'required',
									],

									[
										'field'=>'lname',
										'label'=>'Last Name',
										'rules'=>'required',
									],

									[
										'field'=>'email',
										'label'=>'Email',
										'rules'=>'required',
									],

									[
										'field'=>'pwd',
										'label'=>'Password',
										'rules'=>'required',
									],

									[
										'field'=>'bio',
										'label'=>'Bio',
										'rules'=>'min_length[20]',
									]

							],


				'user_login'=>[
								[
								'field'=>'email',
								'label'=>'Username',
								'rules'=>'required',
								],

								[
								'field'=>'pwd',
								'label'=>'Password',
								'rules'=>'required',
								]
							],


				'update_rules'=>[

									[
										'field'=>'uname',
										'label'=>'Username',
										'rules'=>'required',
									],

									[
										'field'=>'fname',
										'label'=>'First Name',
										'rules'=>'required',
									],

									[
										'field'=>'lname',
										'label'=>'Last Name',
										'rules'=>'required',
									],

									[
										'field'=>'email',
										'label'=>'Email',
										'rules'=>'required',
									],

									[
										'field'=>'bio',
										'label'=>'Bio',
										'rules'=>'min_length[12]',
									]

							],

			

		];
