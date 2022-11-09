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
  TextInput
} from "grommet";
import PocketBase from "pocketbase";
import { useNavigate } from "react-router-dom";

const client = new PocketBase("http://127.0.0.1:8090");

export const LoginForm = () => {
  const [submitted, setSubmitted] = useState(false);
  const navigate = useNavigate();

  async function authenticateUser(email, password) {
    const authData = await client.users.authViaEmail(email, password);
    return authData;
  }

  return (
    <Grommet theme={grommet}>
      <Box align="center">
        <Box width="medium" margin="large">
          <Heading>Login</Heading>
          <Formik
            initialValues={{
              email: "",
              password: ""
            }}
            validate={values => {
              const errors = {};
              if (!values.email) {
                errors.name = "required";
              }
              return errors;
            }}
            validateOnBlur={submitted}
            validateOnChange={submitted}
            onSubmit={async (values, { setSubmitting }) => {
              // whatever submitting the form should entail
              authenticateUser(values.email, values.password).then((data) => {
                console.log(data);
                console.log('success');
                navigate('/dashboard');
              }).catch((err) => {
                console.log('error', err);
              });
            }}
          >
            {({
              values,
              errors,
              handleChange,
              handleSubmit,
              setFieldValue
            }) => (
              <form
                onSubmit={event => {
                  event.preventDefault();
                  handleSubmit();
                }}
              >
                <FormField label="Email address" error={errors.email}>
                  <TextInput
                    name="email"
                    value={values.email || ""}
                    onChange={handleChange}
                    required
                  />
                </FormField>
                <FormField label="Password" error={errors.password}>
                  <TextInput
                    name="password"
                    type="password"
                    value={values.password || ""}
                    onChange={handleChange}
                    required
                  />
                </FormField>
                <Box
                  tag="footer"
                  margin={{ top: "medium" }}
                  direction="row"
                  justify="between"
                >
                  <Button
                    style={{ backgroundColor: "#444444", color: "white" }}
                    color="white"
                    type="submit"
                    danger
                    label="Submit"
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
