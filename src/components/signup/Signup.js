import React, { useState } from "react";
import { Formik } from "formik";
import {
  grommet,
  Box,
  Button,
  Grommet,
  FormField,
  Heading,
  Select,
  TextArea,
  TextInput,
} from "grommet";
import PocketBase from "pocketbase";
import { useNavigate } from "react-router-dom";

const client = new PocketBase("http://127.0.0.1:8090");

export const SignupForm = () => {
  const [submitted, setSubmitted] = useState(false);
  const [selectValue, setSelectValue] = useState("");
  const navigate = useNavigate();

  return (
    <Grommet theme={grommet}>
      <Box align="center" className="bg-secondary">
        <Box width="medium" margin="large">
          <Heading>Signup</Heading>
          <Formik
            initialValues={{
              username: "",
              password: "",
              email_address: "",
              type: "",
              phone_number: "",
              confirm_password: "",
            }}
            validate={(values) => {
              const errors = {};
              if (!values.username) {
                errors.name = "required";
              }
              if (!values.email_address) {
                errors.email_address = "required";
              }
              if (!values.type) {
                errors.type = "required";
              }
              if (!values.phone_number) {
                errors.phone_number = "required";
              }
              if (
                values.phone_number.length !== 10 ||
                isNaN(values.phone_number)
              ) {
                errors.phone_number = "invalid phone number";
              }
              if (!values.password) {
                errors.password = "required";
              }
              if(values.password.length < 8) {
                errors.password = "password must be at least 8 characters";
              }
              if (!values.confirm_password) {
                errors.confirm_password = "required";
              }
              if (values.confirm_password !== values.password) {
                errors.confirm_password = "passwords do not match";
              }
              return errors;
            }}
            validateOnBlur={submitted}
            validateOnChange={submitted}
            onSubmit={(values, { setSubmitting }) => {
              setSubmitting(true);
              // create user
              const user = client.users
                .create({
                  email: values.email_address,
                  password: values.password,
                  passwordConfirm: values.confirm_password,
                })
                .then((res) => {
                  client.records
                  .create("users", values)
                  .then((res) => {
                    console.log('Me',res);
                    navigate("/signin");
                  })
                  .catch((err) => {
                    console.log(err);
                  });
                })
                .catch((err) => {
                  console.log(err);
                });
               // whatever submitting the form should entail
              setSubmitted(true);
              setSubmitting();
            }}
          >
            {({
              values,
              errors,
              handleChange,
              handleBlur,
              handleSubmit,
              setFieldValue,
            }) => (
              <form
                onSubmit={(event) => {
                  event.preventDefault();
                  handleSubmit();
                }}
              >
                <FormField label="Username" error={errors.username}>
                  <TextInput
                    name="username"
                    value={values.username || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="Phone Number" error={errors.phone_number}>
                  <TextInput
                    name="phone_number"
                    value={values.phone_number || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="Email" error={errors.email_address}>
                  <TextInput
                    type={"email"}
                    name="email_address"
                    value={values.email_address || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="User Type" error={errors.type}>
                  <Select
                    name="type"
                    options={["Job Seeker", "Administrator"]}
                    value={selectValue}
                    onChange={({ option }) => {
                      values.type = option;
                      setSelectValue(option);
                      return option;
                    }}
                    onBlur={handleBlur}
                  />
                </FormField>
                <FormField label="Password" error={errors.password}>
                  <TextInput
                    name="password"
                    type="password"
                    value={values.password || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField
                  label="Confirm Password"
                  error={errors.confirm_password}
                >
                  <TextInput
                    name="confirm_password"
                    type="password"
                    value={values.confirm_password || ""}
                    onChange={handleChange}
                    onBlur={() => {
                      if (values.password !== values.confirm_password) {
                        return alert("Passwords do not match");
                      }
                    }}
                  />
                </FormField>
                <Box
                  tag="footer"
                  margin={{ top: "medium" }}
                  direction="row"
                  justify="between"
                >
                  <Button
                    type="submit"
                    style={{ backgroundColor: "#444444", color: "white" }}
                    color="white"
                    label="Create"
                    theme={grommet}
                  />
                </Box>
              </form>
            )}
          </Formik>
        </Box>
      </Box>
    </Grommet>
  );
};
